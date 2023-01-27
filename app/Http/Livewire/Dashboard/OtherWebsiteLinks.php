<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class OtherWebsiteLinks extends Component
{
    public $websites = [];

    public function mount(){
        $this->websites = [
          [
              'url'=>'https://www.uniranks.com/',
              'icon'=>\AppConst::ICONS.'/UR-icon.png',
              'logo'=>\AppConst::ICONS.'/UR-logo.svg',
              'title'=>'',
              'description'=>'Stay in touch with UNIRANKS ranking editions, news,
                        jobs, and more.'
          ],
          [
              'url'=>'https://www.whersconference.com/',
              'icon'=>\AppConst::ICONS.'/WHERS_logo.svg',
              'logo'=>\AppConst::ICONS.'/WHERS_logo_text.svg',
              'title'=>'WORLD HIGHER EDUCATION RANKING Summit',
              'description'=>'Join us at WHERS Conference and Exhibition and become
                        an integral part of the launch of UNIRANKS platform.'
          ],
          [
              'url'=>'https://www.quantumhe.com/',
              'icon'=>\AppConst::ICONS.'/Q_logo.svg',
              'logo'=>\AppConst::ICONS.'/quantum.svg',
              'title'=>'Higher Education',
              'description'=>'Join us at WHERS Conference and Exhibition and become
                        an integral part of the launch of UNIRANKS platform.'
          ],
        ];
    }
    public function render()
    {
        return view('livewire.dashboard.other-website-links');
    }
}
