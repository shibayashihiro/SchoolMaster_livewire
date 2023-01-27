<?php

namespace App\Http\Livewire\Statistics\Majors;

use App\Models\General\Major;
use App\Models\User;
use AppConst;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
class MajorsStatistic extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public $students_Count, $total_Count;

    public function mount(){
        $this->total_Count = $this->getTotalCount();
    }

    public function render()
    {
        $majors = $this->loadMajors();
        return view('livewire.statistics.majors.majors-statistic', compact('majors'));
    }

    public function loadMajors(): LengthAwarePaginator
    {
        return Major::whereRelation('students', 'campus_id', Auth::user()->selected_school->id)
                ->withCount('students')
                ->orderByDesc('students_count')
                ->paginate(10);
    }

    public function getTotalCount(){
        $list = Major::whereRelation('students', 'campus_id', Auth::user()->selected_school->id)
        ->withCount('students')->get();
        return $list->sum('students_count');
    }
}
