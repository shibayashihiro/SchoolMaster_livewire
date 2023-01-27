<footer class="dark_blue_background">
    <div class="container px-md-0 pt-5 pb-3">
        <div id="MainFooter" class="pb-4">
            <div class="footer_top d-flex justify-content-between pb-5">
                <div style="align-self: center;">
                    <img loading="lazy" class="footer_logo" src="{{ AppConst::SM_LOGOS_CDN . '/SM-Logo-white-vertical.png' }}" alt="footer-logo" />
                </div>
                <div class="footer_menu d-flex flex-column">
                    <h3 class="footer_header">{{ __('menu.ranking') }}s</h3>
                    <hr class="special_line" />
                    <a class="footer_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.top_world_universities') }}</a>
                    <a class="footer_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.top_north_america_universities') }}</a>
                    <a class="footer_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.top_latin_america_universities') }}</a>
                    <a class="footer_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.top_europe_universities') }}</a>
                    <a class="footer_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.top_asia_universities') }}</a>
                    <a class="footer_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.top_africa_universities') }}</a>
                    <a class="footer_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.top_arab_universities') }}</a>
                    <a class="footer_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.top_oceania_universities') }}</a>
                </div>
                <div class="footer_menu d-flex flex-column">
                    <h3 class="footer_header">{{ __('footer.in_touch') }}</h3>
                    <hr class="special_line" />
                    <a class="footer_menu_item" href="https://www.uniranks.com/contact" target="_blank">{{ __('footer.contact_us') }}</a>
                    <a class="footer_menu_item" href="https://www.uniranks.com/issues-feedback" target="_blank">{{ __('footer.report_issues') }}</a>
                    <a class="footer_menu_item" href="https://www.uniranks.com/issues-feedback" target="_blank">{{ __('footer.send_feedback') }}</a>
                    <a class="footer_menu_item" href="https://committee.uniranks.com/register" target="_blank">{{ __('general.text_ranking_committee') }}</a>
                    <a class="footer_menu_item" href="https://uniadmin.uniranks.com/register" target="_blank">{{ __('general.text_university_claim') }}</a>
                    <a class="footer_menu_item" href="https://uniadmin.uniranks.com/register-university" target="_blank">{{ __('general.text_university_register') }}</a>
                </div>

                <div class="footer_menu d-flex flex-column">
                    <h3 class="footer_header">{{ __('footer.get_in_touch') }}</h3>
                    <hr class="special_line" />
                    <div class="d-flex">
                        <a class="footer_menu_item" href="javascript:void(0)"><i class="fab fa-facebook-square fa-2x me-3"></i></a>
                        <a class="footer_menu_item" href="javascript:void(0)"><i class="fab fa-twitter fa-2x me-3"></i></a>
                        <a class="footer_menu_item" href="javascript:void(0)"><i class="fab fa-instagram fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="LowerFooter" class="d-flex footer-last">
            <div class="bottom_menu d-none  d-md-flex justify-content-between ps-2">
                <a class="footer_menu_item bottom_menu_item bottom_menu_item_first" href="javascript:void(0)">{{ __('footer.text_faq') }}</a>
                <a class="footer_menu_item bottom_menu_item  coming-soon" href="javascript:void(0)">{{ __('footer.text_partners') }}</a>
                <a class="footer_menu_item bottom_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.text_contact') }}</a>
                <a class="footer_menu_item bottom_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.text_privacy') }}</a>
                <a class="footer_menu_item bottom_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.text_cookies') }}</a>
                <a class="footer_menu_item bottom_menu_item coming-soon" href="javascript:void(0)">{{ __('footer.text_terms') }}</a>
            </div>
            <p class="flex-fill footer_menu_item bottom_menu_item text-center">
                {{ date('Y') }} &copy; {{ __('footer.text_rights') }}</p>
            <p class="footer_menu_item bottom_menu_item d-none d-md-block">{{ session('country_info')['name'] }} </p>
            <p class="footer_menu_item bottom_menu_item d-none d-md-block">
                <a class="text-white px-1"
                   href="{{(config('app.locale','en') != 'en' ? route('setLanguage','en'):"javascript:void(0)")}}">
                    English
                </a>
                @if(!empty(session('country_info')['suggested_language']))
                        @php
                            /** @var \App\Models\General\Language $suggested_language */
                            $suggested_language = session('country_info')['suggested_language']
                        @endphp
                    <a class="text-white px-1 border-start"
                       href="{{($suggested_language->code != config('app.locale') ? route('setLanguage',$suggested_language->code):"javascript:void(0)")}}">
                        {!! $suggested_language->native_name !!}
                    </a>
                @endif
            </p>
            @php
                /** @var \App\Models\General\Language $language */
            @endphp
            @if(!empty(languages()))
            <div class="input-group foot-lang ms-3 pe-2 d-none d-md-block">
                <select id="footer-language-select" onchange="window.location = '{{route('setLanguage')}}/'+this.value ">
                    @foreach(languages() as $language)
                        <option value="{{$language->code}}" {{$language->code == config('app.locale') ? 'selected':''}}>
                            {!! $language->native_name !!}
                        </option>
                    @endforeach
                </select>
            </div>
            @endif
        </div>

    </div>
</footer>
