<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('dashboard.auth.login');
    }

    public function loginProcess(AdminLoginRequest $request)
    {

        if (Auth::guard('admin')->attempt($request->validated(),$request->filled('remember'))) {
            return redirect()->route('dashboard.view')->with('success', 'Successfully Logged in!');
        }

        return redirect()->back()->with('error', "Invalid email or password. Please try again.!");
    }
}
