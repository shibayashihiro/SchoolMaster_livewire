<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Fairs\Fair;
use App\Models\Fairs\Invitation;
use App\Models\Institutes\University;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Fair::truncate();
        for($i = 1; $i<=5;$i++) {
            $crate_fair = [
                'school_id' => 1,
                'fair_name' => 'Test Fair '.$i,
                'fair_type' => \AppConst::FAIR,
                'type' => 1,
                'start_date' => Carbon::now()->addDays($i)->toDateTimeString(),
                'end_date' => Carbon::now()->addDays(($i+1))->toDateTimeString(),
                'max' => 100,
            ];
            $fair = Fair::create($crate_fair);
            $fair->history()->create(['details'=>$crate_fair]);
        }
        Invitation::truncate();
        $fairs = Fair::all();
        foreach ($fairs as $fair){
            $data = [];
            for ($i=0;$i<100;$i++) {
             $data [] =[
                    'fair_id'=>$fair->id,
                    'university_id' => University::inRandomOrder()->value('id'),
                    'status' => \Arr::random([0, 1, 2]),
                    'accepted_by_school' => \AppConst::REGISTARTION_PENDING
                ];
            }
            Invitation::insert($data);
        }

    }
}
