<?php

namespace App\Http\Requests\School\Info;

use App\Models\Institutes\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveSchoolBasicInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'school_name'=>['required'],
            'phone'=>['required'],
            'email'=>['email',Rule::unique(School::class,'email')->ignore(\Auth::user()->selected_school->id)],
            'website'=>['required'],
            'facebook_url'=>['required'],
            'linkedin_url'=>['required'],
        ];
    }
}
