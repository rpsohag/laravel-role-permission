<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardView(){
        $setting = Auth::guard('admin')->user();
        return view('dashboard.dashboard',['setting' => $setting]);
    }
}
