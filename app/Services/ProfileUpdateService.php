<?php
namespace App\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateService
{
    public function updateAdminProfile(Request $request)
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);

        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'designation' => $request->designation,
            'country' => $request->country,
            'phone' => $request->phone,
            'bio' => $request->bio,
        ]);

        return true;
    }
}