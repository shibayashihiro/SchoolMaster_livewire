<div>
    @php
        /**
        * @var \Illuminate\Database\Eloquent\Collection | \App\Models\School\SchoolPointType[] $select_transaction
        * @var \Illuminate\Database\Eloquent\Collection | \App\Models\School\SchoolPointSource[] $select_source
        * @var \Illuminate\Database\Eloquent\Collection | \App\Models\School\SchoolPointHistory[] $histories
        * @var float $balance
        * @var float $earned_credit
        * @var float $consumed_credit
        **/
    @endphp
     <div class="row my-3">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div class="h5 text-blue">@lang('SM Credit History')</div>
                <span class=" h5 text-blue">@lang('Total Credit '. $credit_total)</span>
            </div>
            <div class="row">
                <div class="col-3">
                    <p class="text-grey">@lang('SM Credit History')</p>
                </div>
                <div class="col-3">
                    <select wire:model="search_source" name="search_source" class="text-start form-control input-field" aria-label="" wire:change="loadHistory">
                        <option value="">Select Source</option>
                        @foreach($select_source as $source)
                            <option value="{{ $source->id }}">{{ $source->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <select wire:model="search_transaction" name="search_transaction" class="text-start form-control input-field" aria-label="" wire:change="loadHistory">
                        <option value="">Select Transaction</option>
                        @foreach($select_transaction as $transaction)
                            <option value="{{ $transaction->id }}">{{ $transaction->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <x-elements.date-range-picker wire:model="search_period" placeholder="Select Period"  />
                </div>
            </div><br>
            <div class="card">
                <div class="card-body row">
                    <div class="col-12 table-responsive">
                        <div wire:model="load_history" wire:target="loadHistory">
                            <table class="table">
                                <thead class="primary-text">
                                <th class="align-top primary-text text-center" style="font-size:13px">#</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Date')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Source')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Transaction')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Name')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Credit')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Balance')</th>
                                </thead>
                                <tbody class="text-muted align-center">
                                @forelse($histories as $history)
                                    <tr>
                                        <td class="align-center text-center" style="width: 5%">{{ $loop->iteration }}</td>
                                        <td class="align-center text-center" style="width: 15%">{{ $history->updated_at->format('d/m/Y') }}</td>
                                        <td class="align-center text-center" style="width: 15%">{{ $history->withdrawal_id != null ? 'Convert Credit' : $history->pointType->source->title }}</td>
                                        <td class="align-center text-center" style="width: 25%">{{ $history->withdrawal_id != null ? 'Cash out' : $history->pointType->title}}</td>
                                        @if($history->for_student != null)
                                            <td class="align-center text-center" style="width: 20%">{{ $history->forStudent->name }}</td>
                                        @elseif($history->for_fair != null)
                                            <td class="align-center text-center" style="width: 20%">{{ $history->forFair->fair_name }}</td>
                                        @elseif($history->for_university != null)
                                            <td class="align-center text-center" style="width: 20%">{{ $history->forUniversity->university_name }}</td>
                                        @else
                                            <td class="align-center text-center" style="width: 20%">N/A</td>
                                        @endif
                                        <td class="align-center text-center" style="width: 10%">{{ $history->withdrawal_id != null ? '-'.$history->points_out : '+'.$history->points_in }}</td>
                                        @php $balance += ($history->points_in - $history->points_out); @endphp
                                        <td class="align-center text-center" style="width: 10%">{{ $balance }}</td>
                                    </tr>
                                    @php
                                        $earned_credit += $history->points_in;
                                        $consumed_credit += $history->points_out;
                                    @endphp
                                @empty
                                    <tr>
                                        <td colspan="7">
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
            @unless(empty($histories))
                <div class="row" style="margin-top: 20px">
                    <div class="col-3 h6 mt-2" style="padding-left: 30px">
                        <p class="paragraph-style2 blue">{{$histories->total()}} @lang('results found')</p>
                    </div>
                    <div class="col-3 mt-2">
                        <div class="d-flex h6 justify-content-center">
                            <p class="paragraph-style2 blue">@lang('Total earned credit: ') {{ $credit_total }}</p>
                        </div>
                    </div>
                    <div class="col-3 mt-2">
                        <div class="d-flex h6 justify-content-center">
                            <p class="paragraph-style2 blue">@lang('Total consumed credit: ') {{ $points_out_total }}</p>
                        </div>
                    </div>
                    <div class="col-3 h6 mt-2">
                        <div class="d-flex justify-content-center">
                            <p class="paragraph-style2 blue">@lang('Balance: ') {{ $balance_total }}</p>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-12">
                        <div class="d-flex justify-content-center mobile-pagination">
                            <p class="paragraph-style2 blue">{{ $histories->links() }}</p>
                        </div>
                    </div>
                </div>
            @endunless
        </div>
    </div>
</div>
