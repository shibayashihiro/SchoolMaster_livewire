<?php

namespace App\Http\Livewire\Fairs;

use App\Actions\Universities\SearchCallBack;
use App\Models\Fairs\Fair;
use App\Models\Fairs\Invitation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class RegisteredUniversities extends Component
{
    use WithPagination;
    /**
     * @var \App\Models\General\Countries $country_data
     */
    protected string $paginationTheme = 'bootstrap';
    public ?string $country = null;
    public $country_data;
    public $status = 'pending';
    public Fair $fair;

    protected $queryString = ['country' => ['except' => ''],'status' => ['except' => 'pending']];
    protected $listeners = ['countryChanged','filterUniversitiesByInvitationStatus'];

    public function render()
    {
        $this->initData();
        $universities =  $this->loadUniversities();
        $this->dispatchEvents();
        return view('livewire.fairs.registered-universities',compact('universities'));
    }

    private function initData()
    {
        $this->country_data = \Helpers::findCountryUsingName($this->country);
    }

    public function countryChanged($country): void
    {
        $this->resetPage();
        $this->country = $country;
    }

    public function filterUniversitiesByInvitationStatus($status){
        if (!in_array($status,\AppConst::INVITATION_STATUSES)) abort(404);
       $this->status =  $status;
    }

    private function loadUniversities(): LengthAwarePaginator
    {
        $status = \AppConst::INVITATION_STATUSES_BY_KEY[$this->status];
        $callback = SearchCallBack::run(country_id: $this->country_data?->id);
        $query = $this->fair->invitation();
        return $query->where(['status' => \AppConst::INVITATION_ACCEPTED,'accepted_by_school'=>$status])
            ->with(['university.country', 'university.rankingPositions'])
            ->when(!empty($callback), fn(Builder $query) => $query->whereHas('university', $callback))
            ->paginate(30);

    }

    /**
     * @param Invitation $invitation
     * @return void
     */
    public function accepted(Invitation $invitation)
    {
        $invitation->accepted_by_school = \AppConst::REGISTARTION_ACCEPTED;
        $invitation->save();
    }

    public function rejected(Invitation $invitation)
    {
        $invitation->accepted_by_school = \AppConst::REGISTARTION_REJECTED;
        $invitation->save();
    }

    private function dispatchEvents()
    {
//        $this->emit('showRecords');
        $this->emit('goToTop');
    }
}
