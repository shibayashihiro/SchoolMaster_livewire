<?php

namespace Database\Seeders;

use App\Models\Fairs\FairReserveSessionRequest;
use App\Models\Fairs\FairSession;
use App\Models\Institutes\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedCareerTalkJoinRequests extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FairReserveSessionRequest::truncate();
        $sessions = FairSession::get();
        foreach ($sessions as $session){
            $requests = [];
            for ($i=1;$i<=15;$i++){
                $requests[]=[
                  'university_id'=>University::inRandomOrder()->value('id'),
                ];
            }
            $session->reservationRequests()->createMany($requests);
        }
    }
}
