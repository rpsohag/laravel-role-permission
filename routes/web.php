<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  view("welcome");
});


Route::get('/dashboard/login', [LoginController::class, 'loginView'])->name('dashboard.login.view');
Route::post('/dashboard/login', [LoginController::class, 'loginProcess'])->name('dashboard.login.process');

Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('dashboard', [DashboardController::class,'dashboardView'])->name('dashboard.view');
    Route::post('/dashboard/auth/logout', [LoginController::class, 'logoutProcess'])->name('dashboard.auth.logout');
});