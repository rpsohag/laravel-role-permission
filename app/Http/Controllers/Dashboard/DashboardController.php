<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $admin;

    public function __construct()
    {
        $this->admin = Auth::guard('admin')->user();
    }
    public function dashboardView()
    {
        if(is_null($this->admin) || !$this->admin->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        return view('dashboard.dashboard');
    }
}
