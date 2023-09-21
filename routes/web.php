<?php

use App\Http\Controllers\Apps\AppsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::domain('register.' . env('APP_URL'))->group(function(){
    Route::group([
        'namespace' => 'Front',
        'as' => 'front.',
    ], function (){
        Route::get('form', [RegisterController::class, 'register'])->name('registration');
        Route::post('submit', [RegisterController::class, 'submit'])->name('submit');
    });
});

Route::domain('apps.' . env('APP_URL'))->group(function(){
    Route::group([
        'namespace' => 'Apps',
        'as' => 'apps.',
    ], function (){
        Route::get('login', [AppsController::class, 'login'])->name('login');
        Route::get('dashboard`', [AppsController::class, 'dashboard'])->name('dashboard');
    });
});
