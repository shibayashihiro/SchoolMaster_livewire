<?php

namespace App\Http\Livewire\User;

use App\Models\Fairs\EventType;
use App\Models\Fairs\Fair;
use Illuminate\Support\Collection;
use Livewire\Component;

class UserCalander extends Component
{
    public $events = [];
    public $event_type_id;
    public $event_types;

    public function mount()
    {
        $this->event_types = EventType::all();
        $this->loadEventsData();
    }

    public function render()
    {
        return view('livewire.user.user-calander');
    }

    public function loadEventsData()
    {
        $this->events = [];
        $user_school = \Auth::user()->selected_school;
        $user_school_events = Fair::query()->upcoming()
            ->when(!empty($this->event_type_id), fn($q) => $q->where('event_type_id', $this->event_type_id))
            ->selectRaw('id,school_id, DATE(start_date) as start_date,  DATE(end_date) as end_date')
            ->get()->groupBy('start_date');
        $user_school_events->each(function ($fairs, $key) use ($user_school) {
            /** @var Collection $fairs */
            $owned = $fairs->where('school_id', $user_school->id)->count();
            $others = $fairs->where('school_id', '!=', $user_school->id)->count();
            if ($owned > 0) {
                $this->events[] = [
                    'title' => "$owned Owned Events",
                    'start' => $key,
                    'url' => '#',
                    'color' => 'var(--primary)'
                ];
            }
            if ($others > 0) {
                $this->events[] = [
                    'title' => "$others Other Events",
                    'start' => $key,
                    'url' => '#',
                    'color' => 'var(--secondary-blue)',
                ];
            }
        });
        $this->emit('typeChanged',['events'=>$this->events]);
        $this->events = json_encode($this->events);

    }
}
