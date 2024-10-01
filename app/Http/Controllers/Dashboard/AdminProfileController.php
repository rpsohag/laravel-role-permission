<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\ProfileUpdateService;
use App\Http\Requests\AdminProfileUpdateRequest;


class AdminProfileController extends Controller
{

    private $profileUpdateService;

    public function __construct(ProfileUpdateService  $profileUpdateService)
    {
        $this->profileUpdateService = $profileUpdateService;
    }

    public function profileSetting(){
        $setting = Auth::guard('admin')->user();
        return view('dashboard.profile.setting', ['setting' => $setting]);
    }

    public function profileSettingUpdate(AdminProfileUpdateRequest $request){
        $this->profileUpdateService->updateAdminProfile($request);
        return redirect()->back()->with('success', 'Profile Successfully Updated!');
    }

    public function profileAvatarUpdate(Request $request){
        $admin = Auth::guard('admin')->user();
        $avatar = $request->file('avatar');
        $filename = Str::uuid()->toString() . '.' . $avatar->getClientOriginalExtension();
        $avatar->storeAs('images/users/', $filename, 'public');
        $admin->update([
            'avatar' => $filename
        ]);

        return response()->json(['success' => true, 'avatar' => $filename]);
    }

}
