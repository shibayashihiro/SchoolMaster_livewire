<?php

namespace App\Http\Requests\School\Info;

use App\Models\Institutes\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveSchoolStudentsInfoRequest extends FormRequest
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
            'gender_id'=>['required'],
            'curriculum_id'=>['required'],
            'number_grade11'=>['required'],
            'fees_grade11'=>['required'],
            'number_grade12'=>[Rule::requiredIf(!$this->isBritish())],
            'fees_grade12'=>[Rule::requiredIf(!$this->isBritish())],
            'grade_13'=>[Rule::requiredIf($this->isBritish())],
            'grade_13_fee'=>[Rule::requiredIf($this->isBritish())],
        ];
    }

    private function findCurriculmKey($search): bool|int|string
    {
        return array_search($search,School::CURRICULUMS);
    }

    private function isBritish(): bool
    {
        return $this->curriculum_id == $this->findCurriculmKey('British');
    }
}
