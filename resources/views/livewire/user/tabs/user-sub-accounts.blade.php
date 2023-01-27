<div>
    <div class="w-100" x-data="{ showFilters:false }">
        <div class="row mt-3 mt-md-0">
            <div class="col-12 col-md-9 d-flex justify-content-between align-items-center blue">
                <div class="h4 blue">@lang('Sub Accounts')</div>
                <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"></i>
            </div>
            <div class="col-12 col-md-3 mobile-marg d-md-block text-md-end" x-cloak :class="showFilters ? '':'d-none'">
                <button type="submit" class="button-dark-blue button-sm mobile-btn" >
                    @lang('Add New Sub Account')
                </button>
            </div>
        </div>
    </div>
    <x-jet-form-section submit="">
        <x-slot name="form">
            <div class="row">
                <div class="col-12">
                    @if (session('status'))
                        <div class="my-3 font-medium alert alert-{{session('status-type') ?? 'success'}}">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive mt-4">
                        <table class="table">
                            <thead class="primary-text">
                            <tr>
                                <td class="align-top primary-text" style="font-size:13px">#</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('Email')</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('Name')</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('Verified')</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('Schools')</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('Action')</td>
                            </tr>
                            </thead>
                            <tbody class="text-muted align-middle">
                            @php
                                /**
                                * @var \App\Models\User[] $sub_accounts
                                **/
                            @endphp

                            @forelse($sub_accounts as $sub_account)
                                <tr>
                                    <td class="align-top" style="font-size:13px">{{$loop->iteration}}</td>
                                    <td class="align-top" style="font-size:13px">{{$sub_account->email}}</td>
                                    <td class="align-top" style="font-size:13px">{{$sub_account->name}}</td>
                                    <td class="align-top" style="font-size:13px">
                                        {{!empty($sub_account->email_verified_at) ? __('Verified'):__('Not Verified')}}
                                    </td>
                                    <td class="align-top" style="font-size:13px">
                                        <a href="javascript:void(0)" class="blue" data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="Schools: {{$sub_account->schools?->pluck('school_name')->implode(', ')}}">
                                            {{$sub_account->schools->count()}}
                                        </a>
                                    </td>
                                    <td class="align-top" style="font-size:13px">
                                        <a href="javascript:void(0)" wire:click="confirmDelete({{$sub_account->id}})" class="red">{{__('remove')}}</a>
                                    </td>
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
            <!-- Delete User Confirmation Modal -->
            <x-jet-modal wire:model="confirmingUserDeletion">
                <x-slot name="title">
                    {{ __('Delete Account') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                    <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-jet-input type="password" class="mt-1 block w-3/4"
                                     placeholder="{{ __('Password') }}"
                                     x-ref="password"
                                     wire:model.defer="password"
                                     wire:keydown.enter="deleteUser" />

                        <x-jet-input-error for="password" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                        {{ __('Delete Account') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-modal>
        </x-slot>
    </x-jet-form-section>

</div>
