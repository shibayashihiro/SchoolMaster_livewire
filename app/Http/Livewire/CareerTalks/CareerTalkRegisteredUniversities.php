<?php

namespace App\Http\Livewire\CareerTalks;

use App\Actions\Universities\SearchCallBack;
use App\Models\Fairs\Fair;
use App\Models\Fairs\FairReserveSessionRequest;
use App\Models\Fairs\FairSession;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CareerTalkRegisteredUniversities extends Component
{
    use WithPagination;


    use WithPagination;
    /**
     * @var \App\Models\General\Countries $country_data
     */
    protected string $paginationTheme = 'bootstrap';
    public ?string $country = null;
    public $country_data;
    public $status = 'pending';
    public Fair $fair;
    public $major_id;
    public $session_id;

    protected $queryString = [
        'country' => ['except' => ''],
        'major_id' => ['except' => '','as'=>'major'],
        'session_id' => ['except' => '','as'=>'session']];

    protected $listeners = ['countryChanged'];

    public function render()
    {
        $this->initData();
        $universities =  $this->loadUniversities();
        $this->dispatchEvents();
        return view('livewire.career-talks.career-talk-registered-universities',compact('universities'));
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

    private function loadUniversities(): LengthAwarePaginator
    {
        $callback = SearchCallBack::run(country_id: $this->country_data?->id);
        $query = $this->fair->reservationRequests();
        return $query
            ->with(['university.country', 'university.rankingPositions','session.major'])
            ->when(!empty($this->session_id),fn(Builder $query)=>$query->where('fair_session_id',$this->session_id))
            ->when(!empty($this->major_id),fn(Builder $query)=>$query->whereIn('fair_session_id',FairSession::select('id')->where('major_id',$this->major_id)))
            ->when(!empty($callback), fn(Builder $query) => $query->whereHas('university', $callback))
            ->paginate(30);
    }

    /**
     * @param FairReserveSessionRequest $request
     * @return void
     */
    public function accepted(FairReserveSessionRequest $request):void
    {
        $request->session()->update(['university_id'=>$request->university_id]);
        $request->status = \AppConst::REGISTARTION_ACCEPTED;
        $this->emit('registeredUniversitiesListUpdated');
        $request->save();
    }

    public function rejected(FairReserveSessionRequest $request):void
    {
        $request->status = \AppConst::REGISTARTION_REJECTED;
        $request->save();
    }

    public function revoke(FairReserveSessionRequest $request):void
    {
        $request->session()->update(['university_id'=>null]);
        $request->status = \AppConst::REGISTARTION_PENDING;
        $this->emit('registeredUniversitiesListUpdated');
        $request->save();
    }

    private function dispatchEvents()
    {
//        $this->emit('showRecords');
        $this->emit('goToTop');
    }

}
