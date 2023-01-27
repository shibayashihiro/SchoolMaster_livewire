<?php

namespace Database\Seeders;

use App\Imports\ImportDummyData;
use App\Imports\ImportSeederData;
use App\Models\General\Countries;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = "public/dummy-students.xlsx";
        $command = $this->command;
        if (!Storage::exists($file)) {
            $command->error("File storage/{$file} doesn't exists! please upload the file.");
            return;
        }
        $progress = $command->getOutput()->createProgressBar(3);
        $progress->advance();
        $command->comment("Importing Data!");
        /** @var Collection $data */
        $data = Excel::toCollection(new ImportDummyData, Storage::path($file))[0];
        $progress->advance();
        $command->comment("Inserting Data!");
        $countries = Countries::get(['id','country_name'])->pluck('id','country_name');
        $universities = University::get(['id','university_name'])->pluck('id','university_name');
        $majors = Major::get(['id','title'])->pluck('id','title');
        foreach ($data as $key => $student){
            $student = $student->toArray();
            // dump($student);
            $user_universities = [];
            $user_majors = [];
            $user_countries = [];
            for ($i=1;$i<=5;$i++){
                if (!empty($student["major{$i}"])){
                    $user_majors[] = $student["major{$i}"];
                }

                if (!empty($student["university{$i}"])){
                    $user_universities[] = $student["university{$i}"];
                }

                if (!empty($student["destination{$i}"])){
                    $user_countries[] = $student["destination{$i}"];
                }
            }

            $user = User::create([
                'id'=>$student['sid'],
                'role_id'=>\AppConst::STUDENT,
                'campus_id'=>2,
                'name'=>$student['name'] ?? "No Name",
                'profile_photo_path'=>'images/users-profile-photos/'.$student['photo'] ?? '',
                'email'=>$student['email'] ?? 'no_email_'.$key,
                'register_by_app'=>$student['register_by_app'] == 'Yes'?1:0
            ]);
            if (!empty($student['last_event'])) {
                $user->attendedFairs()->attach([$student['last_event']]);
            }
            $user->userBio()->create(['first_name'=>$student['name']]);
            $user->majors()->attach($user_majors);
            $user->preferredUniversities()->attach($user_universities);
            $user->studyDestinations()->attach($user_countries);
        }
        $progress->finish();
    }
}
