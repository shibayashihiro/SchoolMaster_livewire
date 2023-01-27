<?php

namespace App\Http\Livewire\Statistics\Destinations;

use App\Models\General\Countries;
use App\Models\User;
use AppConst;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
class DestinationList extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public $students_Count, $total_Count;

    public function mount(){
        $this->total_Count = $this->getTotalCount();
    }

    public function render()
    {
        $destinations = $this->loadDestinations();
        return view('livewire.statistics.destinations.destination-list', compact('destinations'));
    }

    public function loadDestinations(): LengthAwarePaginator
    {

        return Countries::whereRelation('students', 'campus_id', Auth::user()->selected_school->id)
        ->withCount('students')
        ->orderByDesc('students_count')
        ->paginate(10);
    }

    public function getTotalCount(){
        $list = Countries::whereRelation('students', 'campus_id', Auth::user()->selected_school->id)
        ->withCount('students')->get();
        return $list->sum('students_count');
    }
}
