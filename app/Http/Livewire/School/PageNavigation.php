<?php

namespace App\Http\Livewire\School;

use Livewire\Component;

class PageNavigation extends Component
{
    public  $routes;

    public function mount(){
        $this->routes = [
          ['title'=>'School','name'=>'admin.school.show'],
          ['title'=>'Students','name'=>null],
          ['title'=>'Universities','name'=>'admin.university.list'],
          ['title'=>'Statistic','name'=>null],
          ['title'=>'Applications','name'=>null],
        ];
    }

    public function render()
    {
        return view('livewire.school.page-navigation');
    }
}
