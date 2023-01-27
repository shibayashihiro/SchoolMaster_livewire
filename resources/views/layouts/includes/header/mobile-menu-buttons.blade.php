<a href="javascript:void(0);" class="icon" onclick="showMenu()" style="max-width: fit-content;">
    <i class="fa fa-bars"></i>
</a>
<img src="{{ AppConst::SM_LOGOS_CDN . '/SM-logo-white-horizontal.png' }}" alt="Schools Master"/>
<a href="javascript:void(0);" style="float: right;margin-left: auto;right: 10px;top: 10px;left: auto;"
   class="icon" onclick="showSettings()">
    @guest
        <i class="fa fa-cog" aria-hidden="true"></i>
    @elseauth
        <img src="{{auth()->user()->profile_photo_url}}" alt="DP" style="width: 30px; border-radius: 50%"/>
    @endguest
</a>
