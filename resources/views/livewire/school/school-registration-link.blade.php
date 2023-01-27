<div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="align-self-center">
                    <div class="top-content">
                        <div class=""><h5 class="h5 blue">@lang('Share Student Registration Link')</h5></div>
                    </div>
                    <div class="top-content align-items-end">
                        <div class="col-lg-10">
                            <div class="blue"><a class="light-blue" href="{{$registartion_link}}"
                                                 target="_blank">{{$registartion_link}}</a></div>
                        </div>
                        <div class="w-100 d-block d-md-none my-1"></div>
                        <div class="col-lg-2 text-end mobile-marg" x-data="{ shown: false, timeout:null }">
                            <span x-show="shown" x-transition  x-transition.duration.500ms > @lang('Copied!')</span>
                            <button class="button-sm button-blue m-0 w-100" @click="()=>{
                               navigator.clipboard.writeText('{{$registartion_link}}');
                              clearTimeout(timeout);
                              shown = true;
                              timeout = setTimeout(() => { shown = false }, 2000);
                            }" >@lang('Copy Link')</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                @php
                    /**
                    * @var \App\Models\Institutes\School $school;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  */
                @endphp
                <div class="align-self-center">
                    <div class="top-content">
                        <div class=""><h5 class="h5 blue">@lang('WhatsApp and Social Media Post')</h5></div>
                    </div>
                    <div class="top-content align-items-end">
                        <div class="col-lg-10">
                            <div class="blue"><a class="light-blue paragraph-style2" href="{{$registartion_link}}"
                                                 target="_blank">{{$registartion_link}}</a></div>
                            <div class="mt-3"><img src="{{$school->logo_url}}" height="150px" alt="logo"></div>
                        </div>
                        <div class="w-100 d-block d-md-none my-1"></div>
                        <div class="col-lg-2 text-end mobile-marg" x-data="{ shown: false, timeout:null }">
                            <span x-show="shown" x-transition  x-transition.duration.500ms > @lang('Copied!')</span>
                            <button class="button-sm button-blue m-0 w-100" @click="()=>{
                               navigator.clipboard.writeText('{{$registartion_link}}');
                              clearTimeout(timeout);
                              shown = true;
                              timeout = setTimeout(() => { shown = false }, 2000);
                            }" >@lang('Copy Link')</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push(AppConst::PUSH_JS)
        <script type="text/javascript">
            function copyToClipBoard(){
                // Copy the text inside the text field
                navigator.clipboard.writeText('{{$registartion_link}}');
            }
        </script>
    @endpush
</div>
