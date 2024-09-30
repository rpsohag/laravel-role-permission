<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  view("welcome");
});


Route::group(['middleware' => 'AdminAuthCheck', 'as' => 'dashboard.login.'], function(){
    Route::get('/dashboard/login', [LoginController::class, 'loginView'])->name('view');
    Route::post('/dashboard/login', [LoginController::class, 'loginProcess'])->name('process');
});

Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('dashboard', [DashboardController::class,'dashboardView'])->name('dashboard.view');
    Route::post('/dashboard/auth/logout', [LoginController::class, 'logoutProcess'])->name('dashboard.auth.logout');
});