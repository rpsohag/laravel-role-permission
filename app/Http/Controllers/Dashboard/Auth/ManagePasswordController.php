<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagePasswordController extends Controller
{
    public function changePassword(){
        return view('dashboard.profile.change-password');
    }

    public function adminPasswordUpdate(Request $request){
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ]);



        authAdmin()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
