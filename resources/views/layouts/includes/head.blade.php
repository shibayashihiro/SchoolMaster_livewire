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
<link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/SM-Logo-white-vertical.png' }}" as="image">
<link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/SM-logo-white-horizontal.png' }}" as="image">
<link rel="preload" href="{{ AppConst::SM_LOGOS_CDN. '/logo.png' }}" as="image">
<link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/UR-Logo.png' }}" as="image">
<link rel="preload" href="{{ AppConst::SM_LOGOS_CDN . '/SM-Logo-vertical.png' }}" as="image">
<link rel="preload" href="{{ AppConst::ICONS . '/icon-worldmap.png' }}" as="image">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/template/core.css')}}">
{{--<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">--}}
<link rel="stylesheet" href="{{ asset('assets/css/template/sm.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/template/global.css') }}" type="text/css">
@stack(AppConst::PUSH_CSS)

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
