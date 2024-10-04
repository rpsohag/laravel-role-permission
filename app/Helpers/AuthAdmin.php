<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('authAdmin')) {
    function authAdmin()
    {
        return Auth::guard('admin')->user();
    }
}
