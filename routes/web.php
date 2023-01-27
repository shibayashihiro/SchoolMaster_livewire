<?php

use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('locale/{language?}', function ($language = "en") {
    app()->setLocale($language);
    session()->put('locale', $language);
    return Redirect::back();
})->name('setLanguage');
Route::middleware('setup-locale')->group(function () {
    Route::get('/', function () {
        return redirect('login');
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return redirect('login');
        })->name('dashboard');
    });

    if (config('app.env') == 'local') {
        Route::prefix('test')->name('test')->group(function () {
            Route::prefix('notification')->name('notification')->group(function () {
                Route::get('forget-pass', function () {
                    return (new ResetPasswordNotification('sasasasasasasasasas'))
                        ->toMail(\App\Models\User::find(1));
                });
            });
        });
    }


});


