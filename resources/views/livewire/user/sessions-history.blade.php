<div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="h5 blue">{{ __('Sessions History') }}</div>
        </div>
    </div>
    @php
        /**
        *@var  \App\Models\User\UserSessionsHistory $sessionHistory
        **/
    @endphp
    <div class="card">
        <div id="event_lead">
            <div class="card-body">
                <div class="w-100">
                    <div class="table-responsive">
                        <table class="table blue">
                            <tbody class="blue">
                            <!--Heading Row-->
                            <tr>
                                <td>#</td>
                                <td>{{ __('Country') }}</td>
                                <td>{{ __('IP') }}</td>
                                <td>{{ __('Started at') }}</td>
                                <td>{{ __('Ended at') }}</td>
                                <td>{{ __("Duration") }}</td>
                                <td>{{ __("Agent") }}</td>
                            </tr>
                            <!--End Heading row-->
                            <!--Row Start-->
                            @php
                                use Carbon\Carbon;
                            @endphp
                            @forelse ($sessionHistories as $key => $sessionHistory)
                                <tr>
                                    <td>{{ $loop->iteration + ($sessionHistories->currentPage() - 1) * 10 }}</td>
                                    <td>{{ $sessionHistory->country ?? "---" }}</td>
                                    <td>{{ $sessionHistory->ip_address }}</td>
                                    <td>{{ $sessionHistory->created_at ?? "---"}}</td>
                                    <td>{{ $sessionHistory->ended_at ?? "---" }}</td>
                                    <td>{{ !empty($sessionHistory->ended_at) ? Carbon::create($sessionHistory->ended_at)->diffForHumans($sessionHistory->created_at) : '---' }}</td>
                                    <td>{{$sessionHistory->user_agent}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">
                                        <h6 class="text-center mt-4 no-records">
                                            @lang('No Record Found!')
                                        </h6>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center flex-wrap my-2 small5">
        <label class="primary-text">{{ $sessionHistories->total() }} {{ __("records found") }}</label>
    </div>

    <div class="d-flex justify-content-center mt-4 mobile-pagination">
        {!! $sessionHistories->links() !!}
    </div>
</div>
