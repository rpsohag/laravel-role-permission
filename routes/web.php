<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  view("welcome");
});


Route::view('/dashboard/login', 'dashboard.auth.layout');