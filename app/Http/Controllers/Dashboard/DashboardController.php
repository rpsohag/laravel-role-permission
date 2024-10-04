<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboardView()
    {
        return view('dashboard.dashboard');
    }
}
