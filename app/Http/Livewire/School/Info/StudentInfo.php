<?php

namespace App\Http\Livewire\School\Info;

use App\Models\General\Gender;
use App\Models\Institutes\School;
use Illuminate\Validation\Rule;
use Livewire\Component;

class StudentInfo extends Component
{
    public $school;
    public $active = false;
    public $curriculums;
    public $fee_ranges;
    public $genders;

    // Form Data
    public $gender_id;
    public $curriculum_id;
    public $number_grade11;
    public $number_grade12;
    public $fees_grade12;
    public $grade_13;
    public $grade_13_fee;

    public function mount(){
        $this->school = \Auth::user()->selected_school;
        $country_code = $this->school->country->code;
        $this->curriculums = School::CURRICULUMS;
        $this->fee_ranges = School::FEE_RANGES[$country_code] ?? School::FEE_RANGES['ae'];
        $this->genders = Gender::all();
        $this->setData();
    }

    public function render()
    {
        return view('livewire.school.info.student-info');
    }

    protected function rules()
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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function setData()
    {
        $school = \Auth::user()->selected_school;
        $school->refresh();
        $this->gender_id = $school->gender_id;
        $this->curriculum_id = $school->curriculum_id;
        $this->number_grade11 = $school->number_grade11;
        $this->fees_grade11 = $school->fees_grade11;
        $this->number_grade12 = $school->number_grade12;
        $this->fees_grade12 = $school->fees_grade12;
        $this->grade_13 = $school->grade_13;
        $this->grade_13_fee = $school->grade_13_fee;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $user = \Auth::user();
        $user->selected_school->update($validatedData);
        $this->setData();
        session()->flash('status', 'School Information Updated!');
    }
}
