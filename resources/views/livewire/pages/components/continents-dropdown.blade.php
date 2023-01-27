@php
    /** @var \App\Models\General\Continents $continent */
@endphp
<select id="region" wire:model="region" wire:change="continentChanged"
        class="h-100 text-start form-control input-field" aria-label="filter university by country">
    <option selected value="">World</option>
    @foreach($continents as $continent)
        <option value="{{ $continent->name }}" style="">{{$continent->name}}</option>
    @endforeach
</select>
