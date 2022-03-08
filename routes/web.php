<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Checkin\CheckinController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Transfer\TransferController;
use App\Http\Controllers\Registration\RegistrationController;

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
Route::get('/', [App\Http\Controllers\Registration\RegistrationController::class, 'index'])->name('registration.index');

Route::post('/apply', [RegistrationController::class,'apply'])->name('apply');


Auth::routes();

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
//fetching Facility list
Route::get('getFacility/{id}', function ($id) {
    $facility =  App\Models\Quanaintine_Facility::where('dzongkhag_id',$id)->get();
    return response()->json($facility);
});

//Transfer
Route::get('/transferlist', [TransferController::class,'index'])->name('transferlist');


//fetching Gewog

Route::get('getGewog/{id}', function ($id) {
    $gewog =  App\Models\Gewog::where('dzongkhag_id',$id)->get();
    return response()->json($gewog);
});

//download file
Route::get('getfile/{file_name}', [CheckinController::class, 'downloadFile'])->name('downloadFile');