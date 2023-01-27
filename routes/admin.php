<?php

use App\Http\Controllers\Admin\Fairs\CareerTalkFairController;
use App\Http\Controllers\Admin\Fairs\FairsController;
use App\Http\Controllers\Admin\JoinUniversity\OneOnOneMeetingController;
use App\Http\Controllers\Admin\JoinUniversity\StudentTourController;
use App\Http\Controllers\Admin\School\CreateStudentTourController;
use App\Http\Controllers\Admin\School\Info\ChangePasswordController;
use App\Http\Controllers\Admin\School\Info\SchoolCounselorController;
use App\Http\Controllers\Admin\School\Info\UserBioController;
use App\Http\Controllers\Admin\School\StudentApplicationController;
use App\Http\Controllers\Admin\Tours\InternationalTourVisitController;
use App\Http\Controllers\User\SelectSchoolController;


Route::middleware(['setup-locale', 'auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->name('admin.')->group(function () {

        Route::get('select-school',[SelectSchoolController::class,'index'])->name('selectSchool');
        Route::get('set-school/{school}',[SelectSchoolController::class,'setSchool'])->name('setSchool');

        Route::middleware('school-selected')->group(function (){
            Route::view('/dashboard','pages.dashboard')->name('dashboard');


            //school related routes
            Route::name('school.')->prefix('school')->group(function () {
                Route::get('/', function () {
                    return redirect()->route('admin.school.information');
                })->name('show');

                Route::view('sponsored-events', 'pages.sponsor.request-event-sponsor' )->name('sponsoredEvents');
                Route::view('request-meeting','pages.create-event.request-meeting-s2u')->name('requestMeeting');
                Route::view('request-presentation','pages.create-event.request-presentation-u2s')->name('requestPresentation');
                Route::view('information', 'pages.school.school-information')->name('information');
                Route::view('new-branch','pages.school.school-connect-new')->name('newBranch');
                //Fair
                Route::name('fair.')->prefix('fair')->controller(FairsController::class)->group(function () {
                    Route::get('/', 'index');
                    Route::get('registered-universities/{fair}', 'registeredUniversities')->name('registeredUniversities');
                    Route::get('list', 'fairList')->name('list');
                    Route::get('create', 'create')->name('create');
                    Route::get('edit/{fair}', 'edit')->name('edit');
                    Route::get('view/{fair}', 'view')->name('view');
                    Route::get('confirmed-students/{fair}', 'confirmedStudents')->name('confirmedStudents');
                    Route::get('performance/{fair}', 'performance')->name('performance');
                    Route::get('confirmed-universities/{fair}', 'confirmedUniversities')->name('confirmedUniversities');
                });
                //Career Talks
                Route::name('career-talk.')->prefix('career-talk')->controller(CareerTalkFairController::class)->group(function () {
                    Route::get('/', 'index');
                    Route::get('registered-universities/{fair}', 'registeredUniversities')->name('registeredUniversities');
                    Route::get('list', 'fairList')->name('list');
                    Route::get('create', 'create')->name('create');
                    Route::get('edit/{fair}', 'edit')->name('edit');
                    Route::get('view/{fair}', 'view')->name('view');
                });
                //statistics
                Route::name('statistics.')->prefix('statistics')->group(function (){
                    Route::get('/',function (){
                        return redirect()->route('admin.school.statistics.registrations.list');
                    })->name('show');
                    //
                    Route::name('registrations.')->prefix('registrations')->group(function (){
                        Route::view('list','pages.statistics.registrations.registration-list')->name('list');
                        Route::view('coverage','pages.statistics.registrations.registration-coverage-percentage')->name('coverage');
                    });
                    //
                    Route::name('universities.')->prefix('universities')->group(function (){
                        Route::view('/','pages.statistics.universities.students-universities-list')->name('show');
                        Route::view('student-list','pages.statistics.universities.list-of-university-students-by-students')->name('studentList');
                        Route::view('coverage','pages.statistics.universities.students-university-statistic')->name('coverage');
                        Route::view('selected-by-students','pages.statistics.universities.list-of-university-students-by-students')->name('selectedByStudent');
                    });
                    //
                    Route::name('majors.')->prefix('majors')->group(function (){
                        Route::view('/','pages.statistics.majors.students-majors-statistic')->name('show');
                        Route::view('student-list','pages.statistics.majors.students-selected-a-major-list')->name('studentList');
                        Route::view('coverage','pages.statistics.majors.students-majors-statistic-pie')->name('coverage');
                        Route::view('selected-by-students','pages.statistics.majors.students-selected-by-major')->name('selectedByStudent');
                    });
                    //
                    Route::name('destinations.')->prefix('destinations')->group(function (){
                        Route::view('list','pages.statistics.destinations.list-of-destinations-selected-by-students')->name('show');
                        Route::view('student-list','pages.statistics.destinations.students-destination-list')->name('studentList');
                        Route::view('coverage','pages.statistics.destinations.students-destination-statistic')->name('coverage');
                        Route::view('selected-by-students','pages.statistics.destinations.students-destination-list')->name('selectedByStudent');
                    });
                });
                //School Points
                Route::name('schoolPoints.')->prefix('school-points')->group(function () {
                    Route::view('credit-detail','pages.points.school-sm-credit-detail')->name('creditDetail');
                    Route::view('school-activity','pages.points.school-activity-sm-credit')->name('schoolActivity');
                    Route::view('university-activity','pages.points.university-activity-sm-credit')->name('universityActivity');
                    Route::view('student-activity','pages.points.student-activity-sm-credit')->name('studentActivity');
                    Route::view('convert-credit','pages.points.convert-sm-credit')->name('convertCredit');
                    Route::view('credit-history','pages.points.sm-credit-history')->name('creditHistory');
                });
                //international tours
                Route::name('tours.')->prefix('tours')->group(function (){
                    Route::view('international-visits','pages.tours.international-tours-visit-list')->name('show');
                    Route::get('more-info/{tour}',[InternationalTourVisitController::class,'tourDetails'])->name('details');
                });
                //Join university
                Route::name('join.')->prefix('join')->group(function (){
                    //One on One meetings
                    Route::name('u2c-meetings.')->prefix('one-on-one-meetings')->group(function (){
                        Route::view('/','pages.join-university.u2c-one-to-one-meeting')->name('show');
                        Route::get('booking/{meeting}',[OneOnOneMeetingController::class,'bookingPage'])->name('booking');
                    });
                    //University Events
                    Route::name('universityEvents.')->prefix('university-events')->group(function (){
                        Route::view('open-days','pages.join-university.upcoming-university-open-day')->name('openDay');
                    });
                    //Student Tour
                    Route::name('studentTour.')->prefix('student-tours')->group(function (){
                        Route::view('/','pages.join-university.student-tours')->name('show');
                        Route::get('details/{event}',[StudentTourController::class,'detailsPage'])->name('details');
                    });
                });
                //student tour
                Route::name('studentTour.')->prefix('student-tours')
                    ->controller(CreateStudentTourController::class)->group(function (){
                        Route::get('/','showList')->name('list');
                        Route::get('create','showCreate')->name('create');
                        Route::get('confirmed-universities/{tour}','showCreate')->name('registeredUniversities');
                });
                Route::name('students.')->prefix('students')->group(function (){
                    Route::view('/','pages.students.my-students')->name('list');
                    Route::view('add','pages.students.add-new-student')->name('add');
                    Route::view('add-bulk','pages.students.add-bulk-students')->name('addBulk');
                    //
                    Route::name('registartion.')->prefix('registartion')->group(function (){
                        Route::view('link','pages.students.registration-link')->name('link');
                        Route::view('qr-code','pages.students.registration-qr-code')->name('qr');
                    });
                    //
                    Route::name('application.')->prefix('applications')
                        ->controller(StudentApplicationController::class)->group(function (){
                        Route::get('/','showList')->name('list');
                        Route::get('view/{user}','viewApplication')->name('view');
                        Route::get('attach-recommendation-letter/{user}','showRecommendationLetters')->name('attachLetter');
                    });
                });
            });
            //Suggestions
            Route::name('suggest.')->prefix('suggest')->group(function (){
                Route::view('school','pages.share-suggest.suggest-school')->name('school');
                Route::view('university','pages.share-suggest.suggest-university')->name('university');
            });
            Route::view('universities-list', 'pages.universities.universities-list')->name('university.list');;

            Route::redirect('user/profile',url('admin/school/information?t=user-personal-info'))->name('user.profile');
            Route::view('calander','pages.user.user-calander-page')->name('calander');
            Route::view('sessions','pages.user.active-sessions')->name('sessions');
            Route::view('two-step-verification','pages.user.two-step-verification')->name('twoStepVerification');
            //Notifications
            Route::name('notification.')->prefix('notifications')->group(function (){
                Route::view('application','pages.notifications.application')->name('application');
                Route::view('messages','pages.notifications.messages')->name('messages');
                Route::view('schedule','pages.notifications.schedule')->name('schedule');
                Route::view('new-events','pages.notifications.new-events')->name('newEvents');
                Route::view('student-registration','pages.notifications.new-student-registration')->name('studentRegistartion');
                Route::view('student-chat','pages.notifications.student-chat')->name('studentChat');
                Route::view('student-inquiries','pages.notifications.inquiries')->name('studentInquiries');
            });
            //counselor
            Route::name('counselor.')->prefix('counselor')->group(function (){
                Route::view('courses','pages.counselor.upcoming-counselor-courses')->name('courses');
                Route::view('events','pages.counselor.upcoming-counselor-events')->name('events');
                Route::view('international-trips','pages.counselor.upcoming-international-trips')->name('international');
                Route::view('workshops','pages.counselor.upcoming-counselor-workshop')->name('workshops');
                Route::view('conferences','pages.counselor.upcoming-counselor-conferences')->name('conferences');
//                Route::view('trips','pages.counselor.upcoming-counselor-trips')->name('trips');
                Route::view('visits','pages.counselor.upcoming-university-visit')->name('visits');
            });
        });
    });
