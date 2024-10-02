<?php

use App\Http\Controllers\Dashboard\AdminProfileController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Auth\ManagePasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  view("welcome");
});


Route::group(['middleware' => 'AdminAuthCheck', 'as' => 'dashboard.login.'], function(){
    Route::get('/dashboard/login', [LoginController::class, 'loginView'])->name('view');
    Route::post('/dashboard/login', [LoginController::class, 'loginProcess'])->name('process');
});

Route::group(['middleware' => 'auth:admin', 'as' => 'dashboard.', 'prefix' => 'dashboard'], function(){
    Route::get('/', [DashboardController::class,'dashboardView'])->name('view');

    Route::get('/profile-setting', [AdminProfileController::class,'profileSetting'])->name('profile.setting');
    Route::post('/profile-setting', [AdminProfileController::class,'profileSettingUpdate'])->name('profile.setting.update');
    Route::post('/profile-avatar/update', [AdminProfileController::class,'profileAvatarUpdate'])->name('profile.avatar.update');
    Route::get('/change-password', [ManagePasswordController::class,'changePassword'])->name('change.password');
    Route::patch('/change-password', [ManagePasswordController::class,'adminPasswordUpdate'])->name('change.password.store');
    // logout from dashboard
    Route::post('/auth/logout', [LoginController::class, 'logoutProcess'])->name('auth.logout');
});