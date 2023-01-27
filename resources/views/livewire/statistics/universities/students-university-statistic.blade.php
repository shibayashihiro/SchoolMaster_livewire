<div class="card">
    <div id="event_lead">
        <div class="card-body">
            <div class="w-100">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-5 blue">
                        <p class="paragraph-style2 my-2"> {{ __('Total Students') }}: {{ $totalStudent_count }}</p>
                        <p class="paragraph-style2 my-2 font-weight-bold">{{ $students_selectUniversity_count }} {{ __('Students have already selected their university of choice') }}</p>
                        <p class="paragraph-style2 my-2">{{ __("Remind students who didn't registered or complete their profiles to register and complete their profiles.") }}</p>
                        <button wire:click="sendEmail" class="button-sm button-dark-blue">{{ __("Send Reminder to Students Now!") }}</button>
                        <p class="paragraph-style2 my-2">{{ __("an email will be sent to students who doesn't register or didn't complete their profiles to as a reminder to complete this stage.") }}</p>
                    </div>
                    <div class="col-12 col-md-7" x-init="$nextTick(() => {
                        new Chart('pie-chart', {
                            type: 'pie',
                            data: {
                                labels: ['{{ $students_selectUniversity_count }} {{ __('Students which is') }} {{ $selectUniversities_percentage }}% {{ __('have selected a university') }}', '{{ $students_noUniversity_count }} {{ __('Students which is') }} {{ $notUniversities_percentage }}% {{ __('did not selecte a university yet') }}'],
                                datasets: [{
                                    label: '{{ __('Students-Universities-Statistic Pie') }}',
                                    data: [{{ $students_selectUniversity_count }}, {{ $students_noUniversity_count }}],
                                    backgroundColor: ['#039be5', '#1c345a'],
                                    hoverOffset: 4
                                }],
                            },
                            options: { plugins: { legend: { position: 'top', align: 'start' } } }
                        }) //end new chart function
                    })">
                        <canvas id="pie-chart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
