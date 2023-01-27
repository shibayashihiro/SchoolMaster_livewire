<?php

namespace App\Http\Livewire\Pages\Points;

use App\Models\School\SchoolPointHistory;
use Livewire\Component;

class ConvertSmCredit extends Component
{
    /**
     * @var float $credit_total ;
     * @var float $points_out_total;
     * @var \App\Models\School\SchoolPointHistory $histories;
     * @var float $cash_out;
     * @var float $points_out_total;
     * @var float $points_in_total;
     **/
    public $histories;
    public $credit_total;
    public $points_out_total;
    public $points_in_total;

    public function mount()
    {
        $this->points_in_total = SchoolPointHistory::whereSchoolId(\Auth::user()->campus_id)
            ->sum('points_in');
        $this->points_out_total = SchoolPointHistory::whereSchoolId(\Auth::user()->campus_id)
            ->sum('points_out');

        $this->credit_total = $this->points_in_total - $this->points_out_total;
    }

    public function render()
    {
        return view('livewire.pages.points.convert-sm-credit');
    }
}
