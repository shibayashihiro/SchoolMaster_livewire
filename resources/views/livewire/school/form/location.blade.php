<div>
    @php
        /**
        * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Countries> $countries
        * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Cities> $cities
        */
    @endphp
    <select wire:model="country_id" name="country_id" class="text-start form-control input-field" aria-label="" wire:change="loadCities">
        <option value=""> Select Country</option>
        @foreach($countries as $country)
        <option value="{{$country->id}}">{{$country->country_name}}</option>
        @endforeach
    </select>

    <p wire:loading.block wire:target="loadCities" class="mt-3 start form-control input-field" aria-label="" style="font-size: small ">
        <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading Cities...
    </p>
    <div wire:loading.class="d-none" wire:target="loadCities">
        <select   wire:model="city_id" name="city_id" class="mt-3 start form-control input-field" aria-label="">
            <option value=""> Select City</option>
            @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->city_name}}</option>
            @endforeach
        </select>
    </div>
</div>
