<?php

namespace App\Http\Livewire\Fairs;

use App\Models\Fairs\Fair;
use Livewire\Component;
use Livewire\WithPagination;

class FairsList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public function render()
    {
        $fairs = $this->loadFairs();
        return view('livewire.fairs.fairs-list', compact('fairs'));
    }

    public function loadFairs(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Fair::simpleFair()
            ->whereSchoolId(\Auth::user()->selected_school->id)
            ->withCount(['attendance','invitation'=>fn($q)=>$q->where(['status' => \AppConst::INVITATION_ACCEPTED])])
            ->orderByDesc('start_date')->paginate(10);
    }
}
