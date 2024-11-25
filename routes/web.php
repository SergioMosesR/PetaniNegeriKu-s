<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PetaniController;
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

Route::middleware('guest')->group(function () {
    Route::get('', [Controller::class, 'Welcome'])->name('Welcome');

    Route::get('authenticate/user', [AuthController::class, 'Authenticate'])->name('Authenticate');
    Route::post('authenticate/user/process', [AuthController::class, 'LoginProcess'])->name('AuthenticateProcess');
    Route::post('authenticate/user/register', [AuthController::class, 'RegisterProcess'])->name('AuthenticateRegister');
});

Route::middleware('auth')->group(function(){
    Route::prefix('petani')->group(function(){
        Route::get('dashboard', [PetaniController::class, 'DashboardPetani'])->name('DashboardPetani');
        Route::get('profile', [PetaniController::class, 'ProfilePetani'])->name('ProfilePetani');
    });
});

Route::get('user/logout', [AuthController::class, 'Logout'])->name('AuthenticateLogout');
