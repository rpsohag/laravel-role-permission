<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    protected $adminService;
    protected $admin;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
        $this->admin = Auth::guard('admin')->user();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (is_null($this->admin) || !$this->admin->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $admins = Admin::all();

        return view('dashboard.admin.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null($this->admin) || !$this->admin->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $roles = Role::all();
        return view('dashboard.admin.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreRequest $request)
    {
        if (is_null($this->admin) || !$this->admin->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $this->adminService->createNewAdmin($request);
        return redirect()->back()->with('success', 'Admin Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (is_null($this->admin) || !$this->admin->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        return view('dashboard.admin.edit', ['admin' => $admin, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, string $id)
    {
        if (is_null($this->admin) || !$this->admin->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $this->adminService->updateAdmin($request, $id);

        return redirect()->back()->with('success', 'Admin updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (is_null($this->admin) || !$this->admin->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $admin = Admin::findOrFail($id);
        if ($admin) {
            if ($admin->avatar) {
                Storage::disk('public')->delete('images/users/'.$admin->avatar);
            }
            $admin->delete();

            return redirect()->back()->with('success', 'admin successfully deleted!');
        }

        return redirect()->back()->with('error', 'Something went worng!');
    }

    /**
     * View admin password change page
     */

    public function changeAdminPassword(string $id)
    {
        if (is_null($this->admin) || !$this->admin->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $admin = Admin::findOrFail($id);
        return view('dashboard.admin.change-password', ['admin' => $admin]);
    }

    /**
     * Update admin password
     */
    public function adminPasswordUpdate(Request $request, $id)
    {
        if (is_null($this->admin) || !$this->admin->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $admin = Admin::findOrFail($id);
        $admin->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('success', 'Password successfully updated!');
    }
}
