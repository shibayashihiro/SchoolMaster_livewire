<div class="mt-5">
    <section class="mb-4">
        <h2 class="h2 blue">@lang('Students Statistics')</h2>
        <p class="paragraph-style1 gray font-normal mt-3">@lang('Monitor students registration, applications,
            transactions with universities, enrollments and more')</p>
    </section>
    @foreach($statistics as $cards)
    <div @class(['row g-2','mt-1'=>!$loop->first])>
        @foreach($cards as $card)
        <div class="w-100 d-block d-md-none my-1"></div>
        <!--to force new line-->
        <div class="col">
            <div class="card">
                <div class="p-3 statistics-card-content">
                    <div class="row">
                        <h5 class="h5 blue">{{__($card['title'])}}</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <h3 class="h2 blue">{{__($card['count'])}}</h3>
                        </div>
                        <div class="col-6 mt-1">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    @php
                    $percentage = 0;
                    $students_not_registered = 0;
                    if ($total_students > 0 && $card['students'] > 0){
                        $students_not_registered  = $total_students  - $card['students'];
                        $percentage = ($card['students']/$total_students)*100;
                    }
                    @endphp
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$percentage}} % of the Total {{$total_students}} Students</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$students_not_registered}} Students did not register</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
