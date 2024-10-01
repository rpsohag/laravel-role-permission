<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\ProfileUpdateService;

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

}
