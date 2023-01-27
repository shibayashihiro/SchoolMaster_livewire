<?php

namespace App\Http\Livewire\Statistics\Destinations;

use App\Models\User;
use App\Models\General\Countries;
use AppConst;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsDestinationList extends Component
{
    use WithPagination;

    /** @var integer $major_id */
    public $destination_id =  '';
    public $selectDestinations;

    protected $queryString = ['destination_id' => ['except' => '']];

    protected string $paginationTheme = 'bootstrap';

    public function mount()
    {
        /** @var Major $selectMajors */
        $this->selectDestinations = Countries::whereRelation('students', 'campus_id', Auth::user()->selected_school->id)->get();
    }

    public function render()
    {
        $destination = Countries::find($this->destination_id);
        $students = $this->loadStudents();
        return view('livewire.statistics.destinations.students-destination-list', compact('students', 'destination'));
    }
    public function loadStudents(): LengthAwarePaginator
    {
        return User::with(['majors'])
            ->whereRoleId(\AppConst::STUDENT)
            ->whereCampusId(\Auth::user()->selected_school->id)
            ->when(!empty($this->destination_id),fn($query)=>$query->whereRelation('studyDestinations','country_id',$this->destination_id), fn($query)=>$query->whereHas('studyDestinations'))
            ->paginate(10);
    }
}
