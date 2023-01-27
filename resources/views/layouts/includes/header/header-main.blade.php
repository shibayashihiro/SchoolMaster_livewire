<header id="header-nav" class="bg-dark-primary sm-hidden">
    <x-shared.general.main>
        <div class="d-flex justify-content-between">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @include('layouts.includes.header.header-links')
                </div>
            </nav>
            <div class="d-flex justify-content-center align-items-center">
{{--                <livewire:general.main-searchbar/>--}}
                @include('layouts.includes.header.main-auth-menu')
            </div>
        </div>
    </x-shared.general.main>
    <div class="w-100 bg-white border-bottom">
        <x-shared.general.main>
            <section class="bg-white d-flex" id="top-bar" style="height: 80px !important">
                <div class="d-flex flex-fill">
                    <a href="{{url('/')}}" style="align-self: center">
                        <img class="header-logo d-none d-lg-inline-block pointer" style="width: 250px; height: auto; "
                             src="{{ AppConst::SM_LOGOS_CDN. '/logo.png' }}" alt="Unirank"/>
                    </a>

                    <div class="d-flex align-items-center text-grey ms-4 ps-2">
                        @include('layouts.includes.header.community-main-menu')
                    </div>
                </div>
                <div class="d-flex align-items-center light_blue_text">
                    <span class="mx-3 facebook">
                        <i class="fa fa-lg fa-facebook mx-2"></i>
                        <i class="fa fa-lg fa-twitter mx-2"></i>
                        <i class="fa fa-lg fa-instagram mx-2"></i>
                    </span>
                    @include('layouts.includes.header.main-languages-menu')
                </div>
            </section>
        </x-shared.general.main>
    </div>
</header>
