<?php

namespace App\Http\Livewire\CareerTalks;

use App\Models\Fairs\Fair;
use Livewire\Component;
use Livewire\WithPagination;

class CareerTalkList extends Component
{

    use WithPagination;

    protected string $paginationTheme = 'bootstrap' ;

    public function loadFairs(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {

        return  Fair::careerTalk()
            ->whereSchoolId(\Auth::user()->selected_school->id)
            ->withCount(['reservationRequests','sessions','attendance'])
            ->orderByDesc('start_date')
            ->paginate(10);
    }

    public function render()
    {
        $fairs = $this->loadFairs();

        return view('livewire.career-talks.career-talk-list',compact('fairs'));
    }
}
