<?php

namespace App\Http\Livewire\Students;

use App\Imports\ImportDummyData;
use App\Models\General\Countries;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

use Livewire\WithPagination;

class AddBulkStudents extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public $miofile;
    public $newStudent_count = 0;
    public $existStudent_count = 0;
    public $invalidStudent_count = 0;

    public $exist_students = [];
    public $invalid_students = [];

    public $fileName = 'File Name';

    public function updatedMiofile()
    {
        $nationalities = Countries::pluck('id','country_name');

        $this->fileName = $this->miofile->getClientOriginalName();
        $file_path = $this->miofile->path();
        $data = Excel::toCollection(new ImportDummyData, $file_path)[0];
        foreach ($data as $key => $student) {
            $student = $student->toArray();
            if(in_array(null, $student, true)) {
                $this->invalidStudent_count++;
                $this->invalid_students[] = $student;
                continue;
            }
            if((User::where('email', '=', $student['student_email_address'])->get()->value('id')) != null) {
                $this->existStudent_count++;
                $this->exist_students[] = $student;
                continue;
            }
                $this->newStudent_count++;
                $user = User::create([
                    'name' => $student['name'] ?? "No Name",
                    'role_id' => \AppConst::STUDENT,
                    'campus_id' => \Auth::user()->selected_school->id,
                    'email' => $student['student_email_address'] ?? 'no_email_' . $key,
                ]);
                $nationality_id = $natinalities[$student['nationality']] ?? null;
                $user->userBio()->create([
                    'first_name' => $student['name'],
                    'mobile' => $student['phone_number'],
                    'grades' => $student['grade'],
                    'curriculum_id' => $student['curriculum'],
                    'nationality_id' => $nationality_id,
                ]);
                $user->guardian()->create([
                    'email' => $student['parent_email_address'],
                    'mobile_number' => $student['parent_phone_number'],
                ]);
                $user->roles()->attach(\AppConst::STUDENT);
            }
        session()->flash('status', 'Students uploaded Successfully!');
    }

    public function render()
    {
        $students = User::paginate(10);
        return view('livewire.students.add-bulk-students', compact('students'));
    }

    public function resetCount()
    {
        $this->newStudent_count = 0;
        $this->existStudent_count = 0;
        $this->invalid_students = 0;
        $this->exist_students = [];
        $this->invalid_students = [];
    }
}
