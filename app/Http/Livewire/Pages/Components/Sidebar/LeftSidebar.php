<?php

namespace App\Http\Livewire\Pages\Components\Sidebar;

use Livewire\Component;

class LeftSidebar extends Component
{
    public $routes;
    public $profileroutes;
    public $tab = 'basic_info';
    protected $queryString = ['tab' => ['except' => 'basic_info','as'=>'t']];
    public $is_on_page = true;


    public function mount()
    {
        $this->is_on_page = \Route::is('admin.school.information');

        $this->routes = [
            ['icon'=>'fa-circle-info','id'=>'school-basic-info', 'name'=>'basic_info','title'=>'School Basic Info'],
            ['icon'=>'fa-location-pin','id'=>'school-location-info','name'=>'location_info','title'=>'School Location'],
            ['icon'=>'fa-users', 'id'=>'school-student-info','name'=>'student_info','title'=>'School Students Info'],
            // ['icon'=>'fa-building-columns','name'=>'admin.school.fair.registeredUniversities','title'=>'Registered Universities']
        ];

        $this->profileroutes = [
            ['icon'=>'fa-circle-info','id'=>'user-personal-info', 'name'=>'user-personal-info','title'=>'Basic Info'],
            ['icon'=>'fa-location-pin','id'=>'user-emails', 'name'=>'user-emails','title'=>'Email Addresses'],
            ['icon'=>'fa-user-tie','id'=>'user-phone-number', 'name'=>'user-phone-number','title'=>'Phone Numbers'],
            ['icon'=>'fa-users','id'=>'user-password', 'name'=>'user-password','title'=>'Change password'],
//            ['icon'=>'fa-users','id'=>'user-devices', 'name'=>'user-devices','title'=>'Where you\'re signed in'],
//            ['icon'=>'fa-users','id'=>'user-two-step', 'name'=>'user-two-step','title'=>'Two-step verification'],
        ];
    }

    public function render()
    {
        return view('livewire.pages.components.sidebar.left-sidebar');
    }
}
