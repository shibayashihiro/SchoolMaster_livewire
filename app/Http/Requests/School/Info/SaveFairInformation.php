<?php

namespace App\Http\Requests\School\Info;

use App\Models\Institutes\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveFairInformation extends FormRequest
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
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'max' => 'required|numeric',
        ];
    }
}
