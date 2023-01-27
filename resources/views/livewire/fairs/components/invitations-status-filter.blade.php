<div>
    <select id="status-filter" class="h-100 text-start form-control input-field"
            aria-label="filter university by status"
            wire:model="status" wire:change="statusUpdated">
        <option value="" selected>Filter By Status</option>
        @foreach($statuses as $status_value)
            <option value="{{$status_value}}">{{ucfirst($status_value)}}</option>
        @endforeach
    </select>
</div>
