<?php

namespace App\Http\Livewire\Statistics\Universities;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class UniversitiesList extends Component
{
    use WithPagination;

    /** @var integer $university_id */

    protected string $paginationTheme = 'bootstrap';

    public $total_Students;

    public function mount()
    {
        /** @var integer $universities */
        $this->total_Students = User::has('preferredUniversities')->whereCampusId(\Auth::user()->selected_school->id)->count();
    }

    public function render()
    {
        $universities = $this->loadUniversities();
        return view('livewire.statistics.universities.universities-list', compact('universities'));
    }

    public function loadUniversities(): LengthAwarePaginator
    {
        return University::whereRelation('students', 'campus_id', \Auth::user()->selected_school->id)
                ->withCount('students')
                ->orderByDesc('students_count')
                ->paginate(10);
    }
}
