<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AdminProfileController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\ManagePasswordController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'AdminAuthCheck', 'as' => 'dashboard.login.'], function () {
    Route::get('/dashboard/login', [LoginController::class, 'loginView'])->name('view');
    Route::post('/dashboard/login', [LoginController::class, 'loginProcess'])->name('process');
});

Route::group(['middleware' => 'auth:admin', 'as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'dashboardView'])->name('view');

    Route::get('/profile-setting', [AdminProfileController::class, 'profileSetting'])->name('profile.setting');
    Route::post('/profile-setting', [AdminProfileController::class, 'profileSettingUpdate'])->name('profile.setting.update');
    Route::post('/profile-avatar/update', [AdminProfileController::class, 'profileAvatarUpdate'])->name('profile.avatar.update');
    Route::get('/change-password', [ManagePasswordController::class, 'changePassword'])->name('change.password');
    Route::patch('/change-password', [ManagePasswordController::class, 'passwordUpdate'])->name('change.password.store');
    // manage admin
    Route::get('/change-admin-password/{id}', [AdminController::class, 'changeAdminPassword'])->name('admin.change.password');
    Route::patch('/update-admin-password/{id}', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.store');
    Route::resource('admin', AdminController::class);

    // manage roles
    Route::resource('roles', RoleController::class);
    // logout from dashboard
    Route::post('/auth/logout', [LoginController::class, 'logoutProcess'])->name('auth.logout');
});
