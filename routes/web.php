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
use App\Http\Controllers\Apps\MHXCupCategoryController;
use App\Http\Controllers\Apps\MHXCupRaceController;
use App\Http\Controllers\Apps\MHXCupRacerController;
use App\Http\Controllers\Apps\MHXCupRegisterController;
use App\Http\Controllers\Apps\MHXCupResultController;
use App\Http\Controllers\Apps\MHXCupTrackController;
use App\Http\Controllers\Apps\MHXCupTShirtController;
use App\Http\Controllers\Apps\PermissionsController;
use App\Http\Controllers\Apps\PreRegisterController;
use App\Http\Controllers\Apps\RolesController;
use App\Http\Controllers\Apps\SectionController;
use App\Http\Controllers\Apps\UserController;
use App\Http\Controllers\Apps\VendorController;
use App\Http\Controllers\Apps\VisitorController;
use App\Http\Controllers\Apps\VisitorShopeeController;
use App\Http\Controllers\Front\MHXCupController;
use App\Http\Controllers\Front\ParticipantController;
use App\Http\Controllers\Front\RaceController;
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
        Route::get('add-on', [RegisterController::class, 'addOn'])->name('addon');
        Route::post('add-on', [RegisterController::class, 'addOnPost'])->name('addonPost'); // Search
        Route::post('add-on-order', [RegisterController::class, 'addOnOrder'])->name('addonOrder');
        Route::get('add-on-cart', [RegisterController::class, 'addOnCart'])->name('addonCart');
        Route::post('add-on-remove-cart-item', [RegisterController::class, 'removeCartItem'])->name('removeCartItem');
        Route::post('add-on-update-cart-item', [RegisterController::class, 'updateQuantity'])->name('updateCartItem');
        Route::post('add-on-proceed', [RegisterController::class, 'proceedCart'])->name('proceedCart');
        Route::get('add-on-pay-redirect', [RegisterController::class, 'addonHandleRedirect'])->name('addonhandleredirect');
        Route::post('add-on-pay-webhook', [RegisterController::class, 'addonHandleWebhook'])->name('addonhandlewebhook');

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

Route::domain('ticket.' . env('APP_URL'))->group(function (){
    Route::group([
        'namespace' => 'Front',
        'as'        => 'participant.',
    ], function (){
        Route::get('register', [ParticipantController::class, 'formView'])->name('form');
        Route::post('post-register', [ParticipantController::class, 'formPost'])->name('post');
        Route::get('cart', [ParticipantController::class, 'cartView'])->name('cart');
        Route::post('remove-cart-item', [ParticipantController::class, 'removeCartItem'])->name('removecartitem');
        Route::post('update-cart-quantity', [ParticipantController::class, 'updateQuantity'])->name('updatequantity');
        Route::post('update-session', [ParticipantController::class, 'updateSession'])->name('updatesession');
        Route::post('confirm-checkout', [ParticipantController::class, 'confirmCheckout'])->name('confirmcheckout');

        Route::get('visitor-redirect', [ParticipantController::class, 'redirectUrl'])->name('redirection');
        Route::post('visitor-webhook', [ParticipantController::class, 'webHook'])->name('webhook');
    });
});

Route::domain('mhxcup.' . env('APP_URL'))->group(function (){
    Route::group([
        'namespace' => 'Front',
        'as'        => 'mhxcup.',
    ], function (){
        Route::get('welcome', [MHXCupController::class, 'welcome'])->name('welcome');
        Route::get('register', [MHXCupController::class, 'register'])->name('register');
        Route::post('category', [MHXCupController::class, 'categoryPost'])->name('categoryPost');
        Route::get('racer-register', [MHXCupController::class, 'registerFrom'])->name('registerFrom');
        Route::post('register', [MHXCupController::class, 'registerPost'])->name('registerPost');

        Route::post('mhx-payment', [MHXCupController::class, 'mhxPayment'])->name('mhxPayment');
        Route::get('mhx-redirect', [MHXCupController::class, 'redirectUrl'])->name('redirectHook');
        Route::post('mhx-webhook', [MHXCupController::class, 'webhook'])->name('webHook');

        Route::get('scoreboard', [RaceController::class, 'scoreboard'])->name('scoreboard');
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
           Route::resource('vendors', VendorController::class);
           Route::resource('ticket-visitor', VisitorController::class);
           Route::resource('shopee-visitor', VisitorShopeeController::class);
           Route::get('shopee-visitor-data', [VisitorShopeeController::class, 'shopeeData'])->name('shopeeData');
           Route::post('shopee-visitor-redeem', [VisitorShopeeController::class, 'shopeeRedeem'])->name('shopeeRedeem');
           Route::post('ticket-visitor/{id}/update-redeem-status', [VisitorController::class, 'updateRedeemStatus'])->name('ticket-visitor.updateRedeemStatus');

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
               Route::get('sponsorship', [AppsController::class, 'sponsorship'])->name('sponsorship');
           });
           Route::group([
               'prefix'  => 'mhx-cup',
               'as'     => 'mhx-cup.'
           ], function (){
               Route::resource('t-shirt', MHXCupTShirtController::class);
               Route::resource('register', MHXCupRegisterController::class);
               Route::get('registered-recer', [AppsController::class, 'categoryCup'])->name('categoryMhxCup');
               Route::post('approve-register', [AppsController::class, 'approveRegister'])->name('approveRegister');
           });
           Route::group([
               'prefix'  => 'event-mhx-cup',
               'as'     => 'event-mhx-cup.'
           ], function (){
               Route::resource('categories', MHXCupCategoryController::class);
               Route::resource('tracks', MHXCupTrackController::class);
               Route::resource('racers', MHXCupRacerController::class);
               Route::resource('races', MHXCupRaceController::class);
               Route::resource('results', MHXCupResultController::class);

               Route::get('getCategoryData/{categoryId}', [MHXCupRaceController::class, 'getCategoryData'])->name('getCategoryData');
               Route::post('submit-result', [MHXCupRaceController::class, 'submitResult'])->name('result');
               Route::post('race-complete', [MHXCupRaceController::class, 'completeReport'])->name('completeRace');
           });
           Route::group([
               'prefix'  => 'race',
               'as'     => 'race.'
           ], function (){
               Route::get('racing-day', [MHXCupRaceController::class, 'racingDay'])->name('racing-day');
               Route::post('store', [MHXCupRaceController::class, 'store'])->name('store');
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
               Route::get('debug-form', [AppsController::class, 'debugBillplz'])->name('debug');
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
