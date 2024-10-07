<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileUpdateRequest;
use App\Services\ProfileUpdateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProfileController extends Controller
{
    private $profileUpdateService;
    protected $admin;

    public function __construct(ProfileUpdateService $profileUpdateService)
    {
        $this->profileUpdateService = $profileUpdateService;
        $this->admin = Auth::guard('admin')->user();
    }

    public function profileSetting()
    {
        if(is_null($this->admin) || !$this->admin->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        return view('dashboard.profile.setting');
    }

    public function profileSettingUpdate(AdminProfileUpdateRequest $request)
    {
        if(is_null($this->admin) || !$this->admin->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $this->profileUpdateService->updateAdminProfile($request);

        return redirect()->back()->with('success', 'Profile Successfully Updated!');
    }

    public function profileAvatarUpdate(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $avatar = $request->file('avatar');
        $filename = Str::uuid()->toString().'.'.$avatar->getClientOriginalExtension();
        $avatar->storeAs('images/users/', $filename, 'public');

        if ($admin->avatar) {
            Storage::disk('public')->delete('images/users/'.$admin->avatar);
        }

        $admin->update([
            'avatar' => $filename,
        ]);

        return response()->json(['success' => true, 'avatar' => $filename]);
    }
}
