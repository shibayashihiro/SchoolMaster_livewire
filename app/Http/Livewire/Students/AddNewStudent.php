<?php

namespace App\Http\Livewire\Students;

use App\Models\General\Countries;
use App\Models\General\Curriculum;
use App\Models\General\FeeRange;
use App\Models\General\StudyFunding;
use App\Models\Institutes\School;
use App\Models\Institutes\University;
use App\Models\User;
use App\Models\General\Major;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AddNewStudent extends Component
{
    use WithPagination;

    public $all_majors;
    public $all_destinations;
    public $all_universities;
    public $all_fundings;
    public $all_fee_rages;

    public $first_name;
    public $last_name;
    public $birthday;
    public $fee_range;
    public $country_code;
    public $mobile;
    public $email;
    public $study_fundings;

    public $user_destinations = [];
    public $user_majors = [];
    public $user_universities = [];


    public function mount()
    {
        $this->all_majors = Major::orderBy('title')->get();
        $this->all_destinations = Countries::orderBy('country_name')->get();
        $this->all_fundings = StudyFunding::orderBy('funding_source')->get();

        $this->school = \Auth::user()->selected_school;
        $this->all_fee_rages = FeeRange::all();
    }

    public function setData()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->birthday = '';
        $this->fee_range = '';
        $this->country_code = '';
        $this->mobile = '';
        $this->email = '';
        $this->study_fundings = '';
        $this->user_destinations = [];
        $this->user_majors = [];
        $this->user_universities = [];
    }

    public function render()
    {
        $this->loadUniversities();
        return view('livewire.students.add-new-student');
    }

    /**
     * @param bool $close
     * @return void
     */
    public function save(bool $close = false): void
    {
        $this->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'birthday' => ['required'],
            'fee_range' => ['required'],
            'country_code' => ['required'],
            'mobile' => ['required', 'numeric'],
            'email' => ['required', 'email', 'unique:users'],
            'study_fundings' => ['required'],
            'user_majors' => ['required','array','between:1,5'],
            'user_universities' => ['array'],
            'user_destinations' => ['array'],
        ]);
        $this->createNew($close);
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function createNew(bool $close): void
    {
        $create_user = [
            'name' => $this->first_name. ' '. $this->last_name,
            'email' => $this->email,
            'campus_id' => \Auth::user()->selected_school->id,
            'role_id' => \AppConst::STUDENT
        ];

        $create_user_bio = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthday' => $this->birthday,
            'mobile' => '+'. $this->country_code. ' ' .$this->mobile,
            'mobile_country_id' => $this->country_code,
            'study_fundings' => $this->study_fundings,
            'fee_range_id' => $this->fee_range
        ];
        $user = User::create($create_user);

        $user->userBio()->create($create_user_bio);
        $user->majors()->sync($this->user_majors);
        $user->preferredUniversities()->sync($this->user_universities);
        $user->studyDestinations()->sync($this->user_destinations);
        $user->roles()->attach(\AppConst::STUDENT);

        $this->setData();

        session()->flash('status', 'Student Created Successfully!');
        $this->emit('saved');
        if ($close) {
            $this->redirectStudentList();
        }
    }

    public function redirectStudentList(): void
    {
        $this->redirect(route('admin.school.students.list'));
    }

    public function loadUniversities()
    {
        $this->all_universities = University::whereIn('country_id', $this->user_destinations)->orderBy('university_name')->get();
    }
}
