<?php

namespace App\Actions\Fortify;

use App\Models\Institutes\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     * @throws ValidationException
     */
    public function create(array $input)
    {
        $input = Validator::make($input, [
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country_id' => ['required'],
            'school_id' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->after(function ($validator) use ($input) {
            if (empty($input['school_id'])) {  return;}

            $school = School::find($input['school_id']);
            if (empty($school)) { return ;}
            $school = School::whereId($input['school_id'])->with('admin.userBio')
                ->whereRelation('admin', 'role_id', '=', \AppConst::SCHOOL_ADMINISTRATOR)->first();
            if (empty($school)) return;

            $name = $school?->admin?->userBio?->first_name . ' ' . $school?->admin?->userBio?->last_name;
            $email = $school?->email;
            $validator->errors()->add(
                'school_id', '<span class="text-danger mt-2">School is already claimed by '.$name.' and '.$email.'.<span>
                        <a href="https://schoolsmaster.com/" target="_blank" class="btn btn-primary btn-sm custom-btn" style="background: #2c2f57 !important;" >Report this school to reclaim the profile </a></span></span>'
            );
        })->validate();

        $school = School::find($input['school_id']);

        if (empty($school)) {
            $school = School::create([
                'institute_id' => 1,
                'school_name' => $input['school_id'],
                'country_id' => $input['country_id'],
            ]);
        }

        $userData = [
            'name' => 'Update Profile',
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => \AppConst::SCHOOL_ADMINISTRATOR,
            'campus_id' => $school->id,
        ];

        return DB::transaction(function () use ($input, $userData,$school) {
            return tap(User::create($userData), function (User $user) use ($input,$school) {
                $user->userBio()->create([
                    'user_id' => $user->id,
                    'country_id' => $input['country_id'],
                ]);
                $user->roles()->attach(\AppConst::SCHOOL_ADMINISTRATOR);
                $user->schools()->attach($school->id);
            });
        });
    }
}
