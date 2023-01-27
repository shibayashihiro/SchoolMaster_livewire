<?php

namespace App\Actions\User;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class AddNewUser
{
    use AsAction;
    use PasswordValidationRules;

    public function handle(array $input)
    {
        $input = $this->getInputsCollection($input);
        //TODO: SEND NEW USER AN EMAIL
        return DB::transaction(function () use ($input) {
            return tap(User::create($input->except(['first_name', 'last_name', 'country_id', 'city_id'])->toArray()),
                function (User $user) use ($input) {
                    $user->userBio()->create($input->only(['first_name', 'last_name', 'country_id', 'city_id'])->toArray());
                    $user->roles()->attach(\AppConst::SCHOOL_ADMINISTRATOR);
                    $user->schools()->attach($input->get('school_id'));
                });
        });
    }


    protected function addUserRules(): array
    {
        return [
            'user_account_state' => ['array', 'required'],
            'user_account_state.first_name' => ['required', 'string', 'max:255'],
            'user_account_state.last_name' => ['required', 'string', 'max:255'],
            'user_account_state.position' => [],
            'user_account_state.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'user_account_state.country_id' => [],
            'user_account_state.city_id' => [],
            'user_account_state.school_id' => ['required'],
            'user_account_state.password' => $this->passwordRules(),
        ];
    }

    protected function addUserAttributes(): array
    {
        return [
            'user_account_state.first_name' => 'First Name',
            'user_account_state.last_name' => 'Last Name',
            'user_account_state.position' => 'Position',
            'user_account_state.email' => 'Email',
            'user_account_state.country_id' => 'Country',
            'user_account_state.city_id' => 'City',
            'user_account_state.school_id' => 'School',
            'user_account_state.password' => 'Password',
            'user_account_state.password_confirmation' => 'Confirm Password',
        ];
    }

    protected function addUserValidationMessaged(): array
    {
        return [
            'user_account_state.school_name.required' => 'Please Select :attribute',
            'user_account_state.country_id.required' => 'Please Select :attribute',
            'user_account_state.city_id.required' => 'Please Select :attribute',
        ];
    }

    protected function userValidatedData($input): array
    {
        return \Validator::make($input, $this->addUserRules(), $this->addUserValidationMessaged(), $this->addUserAttributes())->validate();
    }

    protected function getInputsCollection($input): \Illuminate\Support\Collection
    {
        $input = $this->userValidatedData($input)['user_account_state'];

        $input = array_merge($input,[
            'name' => $input['first_name'] . ' ' . $input['first_name'],
            'password' => Hash::make($input['password']),
            'role_id' => \AppConst::SCHOOL_ADMINISTRATOR,
            'main_user_id' => \Auth::id(),
        ]);
        return collect($input);
    }

}
