<?php

use App\Http\Controllers\Apps\AgentController;
use App\Http\Controllers\Apps\AppsController;
use App\Http\Controllers\Apps\BillPlzStatusController;
use App\Http\Controllers\Apps\BillPlzWebhookController;
use App\Http\Controllers\Apps\BoothController;
use App\Http\Controllers\Apps\BoothExhibitionBookedController;
use App\Http\Controllers\Apps\BoothNumberController;
use App\Http\Controllers\Apps\HallController;
use App\Http\Controllers\Apps\LogsController;
use App\Http\Controllers\Apps\PermissionsController;
use App\Http\Controllers\Apps\PreRegisterController;
use App\Http\Controllers\Apps\RolesController;
use App\Http\Controllers\Apps\SectionController;
use App\Http\Controllers\Apps\UserController;
use App\Http\Controllers\Apps\VendorController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\WebController;
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
    Route::get('/', [WebController::class, 'welcome'])->name('welcome');
    Route::post('contactus', [WebController::class, 'submitContact'])->name('submit');
});

Route::domain('vendor.' . env('APP_URL'))->group(function(){
    Route::group([
        'namespace' => 'Front',
        'as'        => 'front.',
    ], function (){
        Route::get('register', [RegisterController::class, 'register'])->name('register');
        Route::get('register/{hall}', [RegisterController::class, 'registerHall'])->name('register.hall');

        Route::post('register', [RegisterController::class, 'booth'])->name('booth');
        Route::post('submit', [RegisterController::class ,'vendorRegister'])->name('submit');
        Route::get('get-booth-numbers', [RegisterController::class ,'getBoothNumbers'])->name('getbooths');
        Route::get('pay-redirect', [RegisterController::class, 'billplzHandleRedirect'])->name('redirect');
        Route::post('pay-webhook', [RegisterController::class, 'billplzHandleWebhook'])->name('webhook');

        Route::get('invoice', function (){
            return view('front.confirmation-email');
        });
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
           Route::get('route', [AppsController::class, 'routeList'])->name('route');
           Route::get('logs', [LogsController::class, 'index'])->name('logs');
           Route::resource('agent', AgentController::class);
           Route::resource('sales-agents', VendorController::class);
           Route::group([
               'prefix'  => 'exhibition',
               'as'     => 'exhibition.'
           ], function (){
               Route::resource('hall', HallController::class);
               Route::resource('section', SectionController::class);
               Route::resource('booth', BoothController::class);
               Route::resource('booth-number', BoothNumberController::class);
               Route::get('batch-booth-edit', [AppsController::class, 'batchboothEdit'])->name('batchboothedit');
               Route::put('batch-booth-update', [AppsController::class, 'batchboothUpdate'])->name('batchboothupdate');
           });
           Route::post('batch-booth-add', [AppsController::class, 'batchStore'])->name('batchboothadd');
           Route::delete('batch-booth-delete', [AppsController::class, 'batchboothNumberDelete'])->name('batchboothdelete');
           Route::group([
               'prefix'  => 'pre-register',
               'as'     => 'preregister.'
           ], function (){
               Route::resource('pre-register', PreRegisterController::class);
               Route::get('selling-vendor', [AppsController::class, 'sellingVendor'])->name('sellingvendor');
               Route::get('hobby-activity', [AppsController::class, 'hobbyActivity'])->name('hobbyactivity');
               Route::get('hobby-showoff', [AppsController::class, 'hobbyShowoff'])->name('hobbyshowoff');
           });
           Route::group([
               'prefix'  => 'acl',
               'as'     => 'acl.'
           ], function (){
               Route::resource('permissions', PermissionsController::class);
               Route::resource('roles', RolesController::class);
               Route::resource('users', UserController::class);
           });
           Route::group([
               'prefix'  => 'billplz',
               'as'     => 'billplz.'
           ], function (){
               Route::resource('status', BillPlzStatusController::class);
               Route::resource('webhook', BillPlzWebhookController::class);
           });
           Route::resource('booth-booked', BoothExhibitionBookedController::class);
           Route::get('apps-logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
           /*Route::group([
               'prefix'  => 'exhibitor',
               'as'     => 'exhibitor.',
           ], function (){
               Route::resource('category',BoothTypeController::class);
               Route::resource('booths',BoothNumberController::class);
           });*/
        });
    });
});
