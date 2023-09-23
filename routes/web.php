<?php

use App\Http\Controllers\Apps\AppsController;
use App\Http\Controllers\Apps\ExhibitController;
use App\Http\Controllers\Apps\PreRegisterController;
use App\Http\Controllers\Front\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'as' => 'web.',
    ], function (){
    Route::get('/', [\App\Http\Controllers\Front\WebController::class, 'welcome'])->name('welcome');
});

Route::domain('register.' . env('APP_URL'))->group(function(){
    Route::group([
        'namespace' => 'Front',
        'as' => 'front.',
    ], function (){
        Route::get('form', [RegisterController::class, 'register'])->name('registration');
        Route::get('interest', [RegisterController::class, 'typeOfInterest'])->name('typeofinterest');
        Route::post('submit', [RegisterController::class, 'submit'])->name('submit');
    });
});

Route::domain('pre-register.' . env('APP_URL'))->group(function (){
    Route::get('join', [RegisterController::class, 'preRegister'])->name('preregister');
    Route::post('join', [RegisterController::class, 'preRegSubmit'])->name('preregsubmit');
});

Route::domain('apps.' . env('APP_URL'))->group(function(){
    Route::group([
        'as' => 'apps.',
    ], function (){
        require base_path('routes/fortify.php');
        /*Route::get('login', [AppsController::class, 'login'])->name('login');*/
        Route::group([
            'middleware'   => 'auth',
        ], function (){
           Route::get('dashboard', [AppsController::class, 'dashboard'])->name('dashboard');
           Route::resource('pre-register', PreRegisterController::class);
           Route::group([
               'prefix'  => 'pre-register',
               'as'     => 'pre-register.'
           ], function (){
               Route::get('selling-vendor', [AppsController::class, 'sellingVendor'])->name('sellingvendor');
               Route::get('hobby-activity', [AppsController::class, 'hobbyActivity'])->name('hobbyactivity');
               Route::get('hobby-show-off', [AppsController::class, 'hobbyShowoff'])->name('hobbyshowoff');
           });
           Route::group([
               'prefix'  => 'events',
               'as'     => 'events.',
           ], function (){
               Route::resource('exhibit', ExhibitController::class);
           });
        });
    });
});
