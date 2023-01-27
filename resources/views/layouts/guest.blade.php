<!DOCTYPE html>

<html lang={{ str_replace('_', '-', app()->getLocale()) }} dir="{{getPageDirection()}}">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="@yield('meta.description')"/>
    <meta name="author" content="Mazajnet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- temp   -->
    <meta name=”robots” content=”noindex”>
    {{--    {{ $pageTitle }}--}}
    <title>@yield('meta.title',config('app.name'))</title>

    <link rel="icon" href="{{ AppConst::SM_LOGOS_CDN . '/favicon.png' }}" id="light-scheme-icon">
    <link rel="icon" href="{{ AppConst::SM_LOGOS_CDN . '/icon.png' }}" id="dark-scheme-icon">

    <!-- Preloading and fetching    -->

    <link href="{{ AppConst::CDN_PATH }}" rel="preconnect" crossorigin>

    {{-- <link rel="preload" href="{{ AppConst::CSS_DIR . '/main.css' }}" as="style" crossorigin> --}}
    {{-- <link rel="preload" href="{{ AppConst::CSS_DIR . '/slider_range_style.css' }}" as="style" crossorigin> --}}
    {{-- <link rel="preload" href="{{ AppConst::SHARED_JS . '/main.js' }}" as="script" crossorigin> --}}

    <link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/SM-Logo-white-vertical.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/SM-logo-white-horizontal.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::SM_LOGOS_CDN. '/logo.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/UR-Logo.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/SM-Logo-vertical.png' }}" as="image">
    <link rel="preload" href="{{ AppConst::ICONS . '/icon-worldmap.png' }}" as="image">

    <!-- End Preloading    -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/schoolmaster.css') }}" type="text/css">

    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;0,700;1,400&family=Open+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" defer/>
    <script src="https://kit.fontawesome.com/9487d74d1e.js" crossorigin="anonymous" defer></script>
    <script src="https://kit.fontawesome.com/2c1e5308ba.js" crossorigin="anonymous" defer></script>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    @livewireStyles

    <style>
        #tab_2 {
            display: none;
        }

        #tab_3 {
            display: none;
        }

        #tab_4 {
            display: none;
        }

        .txt {
            cursor: pointer;
        }

        #basic-info{
            display:none;
        }

        #phone-number{
            display:none;
        }

        #change-password{
            display:none
        }
    </style>
    @stack(AppConst::PUSH_CSS)


</head>

<body>

<div id="loader-wrapper" style="">
    <img id="loader" src="{{ AppConst::SM_LOGOS_CDN . '/SM-Logo-vertical.png' }}" alt="Loading"/>
</div>

<div id="mainBody" class="d-none">

    @include('layouts.includes.header')

    <div class="">
        <div>
            {{ $slot }}
        </div>
        @include('layouts.includes.footer')

        <button id="back_to_top" class="btn btn-secondary" onclick="goTop()" title="Go to top"><i
                class="fas fa-angle-up"></i></button>
    </div>
</div>
<script>
    var asset_url = "{!! asset('assets/') !!}";
    var base_url = "{{ url('/') }}";
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


{{--<script src="{{ asset('assets/js/components/search-modal/search.js') }}"></script>--}}

<script src="{{asset('assets/js/shared/main.js')}}"></script>
{{-- <script src="{{ AppConst::SHARED_JS . '/main.js' }}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>
<script src="{{ asset('assets/js/shared/intlTelInput.js') }}"></script>

<script type="text/javascript">
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(window).on('load', function () {
        // PAGE IS FULLY LOADED
        // FADE OUT YOUR OVERLAYING DIV
        $('#loader-wrapper').fadeOut();
        $('#mainBody').removeClass("d-none");
    });

    function showMenu() {
        var x = document.getElementById("myLinks");
        var y = document.getElementById("setting");
        y.style.display = "none";
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showSettings() {
        var x = document.getElementById("setting");
        var y = document.getElementById("myLinks");
        y.style.display = "none";
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    $(".dropbtn").click(function () {
        $(this).toggleClass("open");
        $(".language-dropdown .dropdown-content").toggleClass("show-drop");
    });

    $('.language-dropdown .dropdown-content a').click(function () {
        $('.dropbtn').removeClass('open');
        $('.language-dropdown .dropdown-content').removeClass('show-drop');
    });

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

</script>

@livewireScripts

<script type="text/javascript">
    Livewire.on('goToTop', () => {
        window.scrollTo({
            top: 350,
            left: 15,
            behaviour: 'smooth'
        })
    })
</script>
{{--@include('layouts.includes.alert')--}}

@stack(AppConst::PUSH_JS)

</body>

</html>
