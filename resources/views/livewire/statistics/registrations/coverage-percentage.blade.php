<div class="row">
    <div class="col-12">
        <div class="h5 blue">{{__("Students Registration Statistic")}}</div>
    </div>
</div>
<div class="card">
    <div id="event_lead">
        <div class="card-body">
            <div class="w-100">

                <div class="row">
                    <div class="col-12 col-md-5 blue">
                        <p class="paragraph-style2 my-2">{{__("Total Students")}}: {{$total_students_count}}</p>
                        <p class="paragraph-style2 my-2 font-weight-bold">{{$registered_students_count}} {{__("Students have already Registered")}}</p>
                        <p class="paragraph-style2 my-2">{{__("Remind students who didn't registered or complete their profiles to register and complete their profiles.")}}</p>
                        <button class="button-sm button-dark-blue" wire:click="sendReminder">{{__("Send Reminder to Students Now!")}}</button>
                        <p class="paragraph-style2 my-2">{{__("an email will be sent to students who doesn't register or didn't complete their profiles to as a reminder to complete this stage.")}}</p>
                    </div>
                    <div class="col-12 col-md-7" x-init="$nextTick(() => {new Chart('pie-chart',{
                       type: 'pie',
                       data: {
                       labels: [ '{{$registered_students_count}} {{__("Students which is")}} {{$registered_students_percentage}}% {{__("have already registered")}}','{{$unregistered_students_count}} {{__("Students which is")}} {{$unregistered_students_percentage}}% {{__("did not register yet")}}'],
                       datasets: [{
                       label: 'My First Dataset',
                       data: [{{$registered_students_count}}, {{$unregistered_students_count}}],
                       backgroundColor: ['#039be5','#1c345a'],
                       hoverOffset: 4
                       }],
                      },
                      options: {plugins: {legend: {position: 'top',align: 'start'}}}
                    })//end new chart function
                })">
                        <canvas id="pie-chart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>