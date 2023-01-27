<div id="mobile-header" class="mobile-container md-hidden" style="width: 100%; position: fixed;top: 0;z-index: 1020;">
    <!-- Top Navigation Menu -->
    <div class="topnav">
        <div class="topnav-inner">
            @include('layouts.includes.header.mobile-menu-buttons')
        </div>
        <div id="myLinks">
            @include('layouts.includes.header.header-links')
        </div>
        <div id="setting" style="display: none; text-align: right;">
            @include('layouts.includes.header.mobile-menu-settings')
        </div>
    </div>
{{--    @include('layouts.includes.header.mobile-searchbar')--}}
    <!-- End smartphone / tablet look -->
</div>
