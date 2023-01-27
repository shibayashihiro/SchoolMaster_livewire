<?php

namespace App\Http\Requests\School\Info;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveSchoolCounselorRequest extends FormRequest
{
    use PasswordValidationRules;

    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['email', 'unique:users'],
            'mobile' => ['present'],
            'facebook_url' => ['present'],
            'password' => $this->passwordRules(),
        ];
    }
}
