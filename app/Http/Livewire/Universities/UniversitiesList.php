<?php

namespace App\Http\Livewire\Universities;

use App\Actions\Universities\SearchCallBack;
use App\Models\Institutes\University;
use App\Models\Ranking\RankingPosition;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class UniversitiesList extends Component
{
    use WithPagination;

    /**
     * @var \App\Models\General\Continents $region_data
     * @var \App\Models\General\Countries $country_data
     */
    protected string $paginationTheme = 'bootstrap';
    public ?string $country = null;
    public ?string $region = null;
    public $country_data;
    public $region_data;
    public $query = '';
    public ?string $heading = '';
    public ?string $description = '';
    protected $queryString = ['region' => ['except' => ''], 'country' => ['except' => ''], 'query' => ['except' => '']];
    protected $listeners = ['countryChanged', 'continentChanged', 'sortBy' => 'sortBy', 'searchUniversity'];

    public function render()
    {
        $this->initData();
        $universities = $this->universities();
        $this->dispatchEvents();
        return view('livewire.universities.universities-list', ['universities' => $universities]);
    }


    public function countryChanged($country): void
    {
        $this->resetPage();
        $this->country = $country;
    }

    public function continentChanged($region)
    {
        $this->resetPage();
        $this->region = $region;
        $this->country = '';
    }

    public function searchUniversity($university)
    {
        $this->query = $university;
    }

    private function universities(): LengthAwarePaginator
    {
        $call_back = SearchCallBack::run($this->query, $this->region_data?->id, $this->country_data?->id);
        return University::query()
            ->addSelect(['position' => RankingPosition::select('world_rank')->whereColumn('university_id', 'universities.id')])
            ->when(!empty($call_back), fn(Builder $query) => $query->where($call_back))
            ->with(['elite.package', 'rankingPositions', 'universityStatus', 'country.region'])
            ->orderByRaw('-position DESC')->paginate(50);
    }

    private function initData()
    {
        $this->region_data = \Helpers::findContinentUsingName($this->region);
        $this->country_data = \Helpers::findCountryUsingName($this->country);
    }

    private function dispatchEvents()
    {
        $this->emit('showRecords');
        $this->emit('goToTop');
    }
}
