<div class="col-lg-1-5 primary-text ps-0 mobile-hidden">
    @php
        /**
         * @var  \Illuminate\Database\Eloquent\Collection<\App\Models\Fairs\FairSession>$sessions
         * @var  \Illuminate\Database\Eloquent\Collection<\App\Models\Fairs\FairSession>$reserevedSessions
         * */
    @endphp
    <div class="card">
        <div class="card-body align-middle">
            <p class="text-blue card-title h5 primary-text">@lang('Session Slots')</p>
            <hr>
            <div class="d-flex w-100 justify-content-between flex-wrap">
                @foreach ($sessions as $count => $session)
                    <div
                        class="w-20 m-1 py-1 {{!empty($session->university_id) ? 'bg-green ':"bg-light-gray primary-text" }}  text-center ">
                        {{$loop->iteration}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body align-middle">
            <p class="text-blue card-title h5 primary-text">@lang('Reserved Slots')</p>
            <hr>
            @forelse ($reserevedSessions as $count => $session)
                <div class="row px-2 my-2">
                    <div class="col-4 p-0" style="height: 100%; align-self: center">
                        <img src="{{$session->university->logo_url}}" alt="logo" />
                    </div>
                    <div class="col-8 pe-0">
                        <p class="small primary-text mb-0">{{$session->university->university_name}}</p>
                        <p class="small secondary-text mb-0">{{$session->major->title}}</p>
                    </div>
                </div>
                @empty
                    <div class="row px-2 my-2">
                        <div class="col-12">
                            <p class="secondary-text text-center">@lang('Not slot taken!')</p>
                        </div>
                    </div>
            @endforelse
        </div>
    </div>
</div>
