<?php

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\CountedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SwapController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', 'login', 302);

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => false,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::middleware('auth')->group(function () {
    Route::get('/swap', SwapController::class)->name('swap');

    Route::resource('users', UserController::class);

    Route::get('/bank-accounts', [BankAccountController::class, 'index'])->name('bank-account');
    Route::post('/bank-accounts-process', [BankAccountController::class, 'process'])->name('bank-account.process');

    Route::get('/counted', [CountedController::class, 'index'])->name('counted');
    Route::post('/counted-process', [CountedController::class, 'process'])->name('counted.process');
});
