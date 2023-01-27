<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class NavigationCards extends Component
{
    public $cards = [];

    public function mount(){
        $this->cards = [
            //row
            [
                //column
                [
                    'url'=>route('admin.school.information'),
                    'title'=>'School',
                    'description'=>'Manage School accounts, student, counselors, events and
                            more',
                    'icon'=>\AppConst::ICONS.'/school.svg',
                ],
                //column
                [
                    'url'=>route('admin.school.information').'?t=user-personal-info',
                    'title'=>'Counselor',
                    'description'=>'Manage your account and sub accounts',
                    'icon'=>\AppConst::ICONS.'/counselor.svg',
                ],
                //column
                [
                    'url'=>route('admin.school.students.list'),
                    'title'=>'Students',
                    'description'=>'Manage, create, upload students information',
                    'icon'=>\AppConst::ICONS.'/students.svg',
                ],
                //column
                [
                    'url'=>route('admin.university.list'),
                    'title'=>'Universities',
                    'description'=>'Checkout and find universities list and rankings',
                    'icon'=>\AppConst::ICONS.'/universities.svg',
                ],
            ],
            //row 2
            [
                //column
                [
                    'url'=>route('admin.school.fair.list'),
                    'title'=>'Create University Fair',
                    'description'=>'Manage and create university fairs',
                    'icon'=>\AppConst::ICONS.'/create_university_fair.svg',
                ],
                //column
                [
                    'url'=>route('admin.school.career-talk.list'),
                    'title'=>'Create Career Talk',
                    'description'=>'Manage and create career talk fairs',
                    'icon'=>\AppConst::ICONS.'/create_career_talk.svg',
                ],
                //column
                [
                    'url'=>route('admin.school.requestPresentation'),
                    'title'=>'Request a Presentation',
                    'description'=>'Manage or request for presentation',
                    'icon'=>\AppConst::ICONS.'/request_for_presentation.svg',
                ],
                //column
                [
                    'url'=>route('admin.school.requestMeeting'),
                    'title'=>'Request a Meeting',
                    'description'=>'Manage or request for meetings',
                    'icon'=>\AppConst::ICONS.'/request_a_meeting.svg',
                ],
            ]
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.navigation-cards');
    }
}
