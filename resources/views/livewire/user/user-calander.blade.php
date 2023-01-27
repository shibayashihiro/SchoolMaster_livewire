<div>
    <div class="row" x-data="{ showFilters:false }">
        <div class="col-12 d-flex justify-content-between blue">
            <div class="h4 blue">@lang('My Calander')</div>
            <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"></i>
        </div>

        <div class="col-12 col-md-3 mt-3 align-items-center d-md-flex" x-cloak :class="showFilters ? '':'d-none'">
            <select class="form-select input-field" wire:model="event_type_id" wire:change="loadEventsData">
                <option value="">@lang('All Events')</option>
                @foreach($event_types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>

    </div>
    @php
        /**
        * @var \App\Models\Institutes\School $school;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  */
    @endphp
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div wire:loading.block ><i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                                Loading...
                            </div>
                        </div>
                    </div>
                    <div class="w-100" wire:loading.attr="disabled">
                        <div id='loading'>loading...</div>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push(AppConst::PUSH_CSS)
        <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('assets/FullCalendar/main.css') }}" type="text/css">
        <style>
            #loading {
                display: none;
                position: absolute;
                top: 10px;
                right: 10px;
            }

            #calendar {
                max-width: 1100px;
                margin: 0 auto;
            }
        </style>

    @endpush

    @push(AppConst::PUSH_JS)

        <script src="{{ asset('assets/FullCalendar/main.js') }}"></script>
        <script>
            document.addEventListener('livewire:load', function() {
                loadCalander({!! $events !!});
            });

            Livewire.on('typeChanged', ({events}) => {
                loadCalander(events);
            })

            function loadCalander(all_events){
                const calendarEl = document.getElementById('calendar');
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap5',
                    dayMaxEvents: true, // allow "more" link when too many events
                    events:all_events,
                });
                setTimeout(()=>{ calendar.render();},300)
            }
        </script>
    @endpush
</div>
