@php
    /** @var \App\Models\General\Countries $country */
@endphp
<select id="countries" class="h-100 text-start form-control input-field"
        aria-label="filter university by country"
        wire:model="country" wire:change="changeCountry">
    <option value="" selected>All Countries</option>
    @foreach($countries as $country)
        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
    @endforeach
</select>
