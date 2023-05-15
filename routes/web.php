<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Models\CustomAuth;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [CustomAuthController::class, 'home']);
    Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
    Route::resource('/customer', App\Http\Controllers\CustomerController::class);
    Route::resource('/officer', App\Http\Controllers\OfficerController::class);
    Route::resource('/type', App\Http\Controllers\TypeController::class);
    Route::resource('/angsuran', App\Http\Controllers\AngsuranController::class);
    Route::resource('/pinjaman', App\Http\Controllers\PinjamannController::class);
});
Route::resource('coba' , App\Http\Controllers\CobaController::class);

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin');
Route::get('forgot', [CustomAuthController::class, 'index'])->name('forgot');
Route::post('postforgot', [CustomAuthController::class, 'forgot'])->name('postforgot');
Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/reset',[CustomAuthController::class, 'reset'])->name('reset');
Route::post('/resetUser',[CustomAuthController::class, 'resetUser'])->name('resetUser');

