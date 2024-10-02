<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\ProfileUpdateService;
use App\Http\Requests\AdminProfileUpdateRequest;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{

    private $profileUpdateService;

    public function __construct(ProfileUpdateService  $profileUpdateService)
    {
        $this->profileUpdateService = $profileUpdateService;
    }

    public function profileSetting(){
        return view('dashboard.profile.setting');
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

        if ($admin->avatar) {
            Storage::disk('public')->delete('images/users/' . $admin->avatar);
        }

        $admin->update([
            'avatar' => $filename
        ]);

        return response()->json(['success' => true, 'avatar' => $filename]);
    }

}
