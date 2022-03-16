<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Checkin\CheckinController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Transfer\TransferController;
use App\Http\Controllers\Registration\RegistrationController;
use App\Http\Controllers\Quaraintine\QuaraintineController;
use App\Http\Controllers\Report\ReportController;


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
//Registraiton
Route::get('/', [App\Http\Controllers\Registration\RegistrationController::class, 'front'])->name('registration.front');
Route::get('/quarantine-register', [App\Http\Controllers\Registration\RegistrationController::class, 'index'])->name('registration.index');

Route::post('/apply', [RegistrationController::class,'apply'])->name('apply');
Route::get('/track-status', [RegistrationController::class,'trackStatusFront'])->name('status_track');
Route::match(['GET', 'POST'],'/track', [RegistrationController::class,'trackStatus'])->name('get_status');



//Authentication

Route::middleware('auth')->group(function () {
    //fetching Facility list
    Route::get('getFacility/{id}', function ($id) {
        $facility =  App\Models\Quanaintine_Facility::where('dzongkhag_id',$id)->get();
        return response()->json($facility);
    });
    //download file
    Route::get('getfile/{file_name}', [CheckinController::class, 'downloadFile'])->name('downloadFile');
  

    Route::resources([
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
    ]);
    
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
    //checkinList
    Route::get('/checkin', [CheckinController::class, 'index'])->name('checkin');
    //Checkin verification
    Route::get('/verify/{ref_id}', [CheckinController::class, 'verify'])->name('verify');
    //allocation
    Route::post('/allocate', [CheckinController::class,'allocate'])->name('allocate');
    
    
    //checkout
    Route::get('/checkoutlist', [CheckoutController::class,'index'])->name('checkoutlist');
    Route::post('/checkout', [CheckoutController::class,'checkout'])->name('checkout');
    //Verifying Checkout
    Route::get('/verifyCheckout/{ref_id}', [CheckoutController::class, 'verifyCheckout'])->name('verifyCheckout');
    
    
    //Transfer
    Route::get('/transferlist', [TransferController::class,'index'])->name('transferlist');
    //Report
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    Route::match(['POST','GET'],'/generate', [ReportController::class,'generate'])->name('reports.generate');

//quaraintine facility

Route::get('/facility', [QuaraintineController::class,'index'])->name('facility');
Route::post('/fstore', [QuaraintineController::class,'store'])->name('addfacility');
Route::delete('/fdelete/{f_id}', [QuaraintineController::class,'destroy'])->name('facility_delete');
Route::get('/fedit/{f_id}', [QuaraintineController::class,'edit'])->name('facility.edit');
Route::put('/fupdate{f_id}', [QuaraintineController::class,'update'])->name('facility.update');
//create user
Route::get('/register-user', [App\Http\Controllers\UserRegisterController::class, 'index'])->name('register-user.index');
Route::get('/register-user/{id}/edit', [App\Http\Controllers\UserRegisterController::class, 'edit'])->name('register-user.edit');
Route::put('/register-user/{id}', [App\Http\Controllers\UserRegisterController::class, 'update'])->name('register-user.update');
Route::post('/register-user', [App\Http\Controllers\UserRegisterController::class, 'store'])->name('register-user.store');
Route::delete('/register-user/{id}', [App\Http\Controllers\UserRegisterController::class, 'destroy'])->name('register-user.destroy');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
//checkinList
Route::get('/checkin', [CheckinController::class, 'index'])->name('checkin');
//Checkin verification
Route::get('/verify/{ref_id}', [CheckinController::class, 'verify'])->name('verify');
//allocation
Route::post('/allocate', [CheckinController::class,'allocate'])->name('allocate');
        

});

// Auth::routes();
Auth::routes(['register' => false,]);




  //fetching Gewog
  Route::get('getGewog/{id}', function ($id) {
    $gewog =  App\Models\Gewog::where('dzongkhag_id',$id)->get();
    return response()->json($gewog);
});

