<?php

namespace App\Http\Livewire\Fairs;

use App\Models\Fairs\Fair;
use App\Models\Fairs\FairEditHistory;
use App\Models\Fairs\FairEditRequest;
use App\Models\Fairs\FairType;
use App\Models\General\Gender;
use App\Models\Institutes\School;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Event;

class CreateFairForm extends Component
{
    public $fair_name;
    public $max;
    public $type;
    public $start_date;
    public $end_date;

    public $fair_types;
    public $school;
    public $curriculums;
    public $genders;
    public $fee_ranges;
    public ?Fair $fair;
    public $title;

    public function mount()
    {
        $this->fair_types = FairType::all();
        $this->school = \Auth::user()->selected_school;
        $country_code = $this->school->country->code;
        $this->curriculums = School::CURRICULUMS;
        $this->genders = Gender::all();
        $this->fee_ranges = School::FEE_RANGES[$country_code] ?? School::FEE_RANGES['ae'];
        $this->setData();
        $this->title = (!empty($this->fair) ? 'Edit' : 'Start New') . ' Fair - Fair Details';
    }

    public function render()
    {
        return view('livewire.fairs.create-fair-form');
    }

    protected function rules()
    {
        return [
            'fair_name' => [''],
            'type' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'max' => ['required'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function setData()
    {
        if (empty($this->fair)) {
            $this->fair = null;
        }
        $this->type = $this->fair?->type;
        $this->fair_name = $this->fair?->fair_name;
        $this->max = $this->fair?->max;
        $this->start_date = $this->fair?->start_date;
        $this->end_date = $this->fair?->end_date;
    }

    public function resetForm()
    {
        $this->redirect(route('admin.school.fair.list'));
    }

    /**
     * @param bool $close
     * @return void
     */
    public function save(bool $close = false): void
    {
        $validatedData = $this->validate();
        if (!empty($this->fair)) {
            $this->update($validatedData,$close);
            return;
        }
        $this->createNew($validatedData,$close);
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function createNew(array $validatedData, bool $close): void
    {
        $validatedData['school_id'] = \Auth::user()->selected_school->id;
        $validatedData['event_type_id'] = \AppConst::FAIR;
        Fair::create($validatedData)->history()->create(['details' => $validatedData, 'operation_type' => FairEditHistory::OPERATION_ADD]);
        session()->flash('status', 'Fair Created Successfully!');
        $this->setData();
        $this->emit('saved');
        if (!$close) {return;}
        $this->redirectAfterSuccess();
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function update(array $validatedData, bool $close):void
    {
        if ($this->fair->is_approved) {
            $this->createUpdateFairRequest($validatedData,$close);
            return;
        }

        $this->updateFairDetails($validatedData,$close);
    }


    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function updateFairDetails(array $validatedData, bool $close): void
    {
        $this->fair->update($validatedData);
        $history = $this->fair->history()->first();
        $history->update(['details'=>$validatedData]);
        session()->flash('status', 'Fair Details Updated!');
        $this->emit('saved');
        $this->fair->refresh();
        if (!$close){ return;}
        $this->redirectAfterSuccess();
    }

    /**
     * @param array $validatedData
     * @param bool $close
     * @return void
     */
    private function createUpdateFairRequest(array $validatedData, bool $close): void
    {
        $validatedData ['requested_by'] = \Auth::id();
        $this->fair->editRequests()->create(['details' => $validatedData]);
        session()->flash('status', 'Fair Update Request Added, Our Team will review it shortly!.');
        $this->emit('saved');
        if (!$close) return;
        $this->redirectAfterSuccess();
    }

    /**
     * @return void
     */
    private function redirectAfterSuccess(): void
    {
        $this->redirect(route('admin.school.fair.list'));
    }

}
