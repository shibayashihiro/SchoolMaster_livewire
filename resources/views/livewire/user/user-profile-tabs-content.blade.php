<div>
    <div @class(['d-none'=>$tab != 'user-basic-info'])>
        <livewire:user.tabs.user-basic-info-tab-content/>
    </div>
    <div @class(['d-none'=>$tab != 'user-emails'])>
        <livewire:user.tabs.user-emails-tab-content/>
    </div>
    <div @class(['d-none'=>$tab != 'user-phone-number'])>
        <livewire:user.tabs.user-phone-number-tab-content/>
    </div>
    <div @class(['d-none'=>$tab != 'user-password'])>
        <livewire:user.tabs.user-update-password-tab-content/>
    </div>
    <div @class(['d-none'=>$tab != 'user-devices'])>
        <livewire:user.tabs.user-loggedin-devices-tab-content/>
    </div>
    <div @class(['d-none'=>$tab != 'user-two-step'])>
        <livewire:user.tabs.user-two-step-varification-tab-content/>
    </div>
</div>
