<?php

namespace App\Http\Requests\School\Info;

use App\Models\Institutes\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveSchoolLocationRequest extends FormRequest
{
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
            'country_id'=>['required'],
            'city_id'=>['required'],
            'address1'=>['required'],
        ];
    }
}
