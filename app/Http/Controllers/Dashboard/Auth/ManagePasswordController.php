<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagePasswordController extends Controller
{
    public function changePassword(){
        return view('dashboard.profile.change-password');
    }
}
