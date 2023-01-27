<div class="card">
    <div class="card-body">
        <div class="w-100">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-12 col-md-5 blue">
                    <p class="paragraph-style2 my-2">{{ __("Total Students") }}: {{ $totalStudents_count }}</p>
                    <p class="paragraph-style2 my-2 font-weight-bold">{{ $students_hasMajor_count }} {{ __("Students have already selected their desired major") }}</p>
                    <p class="paragraph-style2 my-2">{{ __("Remind students who didn't registered or complete their profiles to register and complete their profiles.") }}</p>
                    <button wire:click="sendEmail" class="button-sm button-dark-blue">{{ __("Send Reminder to Students Now!") }}</button>
                    <p class="paragraph-style2 my-2">{{ __("an email will be sent to students who doesn't register or didn't complete their profiles to as a reminder to complete this stage.") }}</p>
                </div>
                <div class="col-12 col-md-7" x-init="$nextTick(() => {
                    new Chart('pie-chart', {
                        type: 'pie',
                        data: {
                            labels: ['{{ $students_hasMajor_count }} {{ __('Students which is') }} {{ $hasMajors_percentage }}%  {{ __('have selected majors') }}', '{{ $students_noMajor_count }} {{ __('Students which is') }} {{ $noMajors_percentage }}% {{ __('did not selected mjors yet') }}'],
                            datasets: [{
                                label: '{{ __('Majors Statistic Pie Chart') }}',
                                data: [{{ $students_hasMajor_count }}, {{ $students_noMajor_count }}],
                                backgroundColor: ['#039be5', '#1c345a'],
                                hoverOffset: 4
                            }],
                        },
                        options: { plugins: { legend: { position: 'top', align: 'start' } } }
                    }) //end new chart function
                })" x-transition:enter.duration.500ms>
                    <canvas id="pie-chart" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
