<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $admin;

    public function __construct()
    {
        $this->admin = Auth::guard('admin')->user();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(is_null($this->admin) || !$this->admin->can('role.view')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $roles = Role::all();
        return view('dashboard.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(is_null($this->admin) || !$this->admin->can('role.create')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $permissions = Permission::all();
        $permission_groups = Admin::getPermissionGroups();
        return view('dashboard.roles.create', ['permissions' => $permissions, 'permission_groups' => $permission_groups]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(is_null($this->admin) || !$this->admin->can('role.create')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
        $permissions = $request->input('permissions');
        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }
        return redirect()->back()->with('success', 'Role created successfully');
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
        if(is_null($this->admin) || !$this->admin->can('role.edit')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $role = Role::findById($id, 'admin');
        $all_permissions = Permission::all();
        $permission_groups = Admin::getpermissionGroups();
        return view('dashboard.roles.edit', compact('role', 'all_permissions', 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(is_null($this->admin) || !$this->admin->can('role.edit')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $request->validate([
            'name' => 'required',
        ]);
        $role = Role::findById($id, 'admin');
        $permissions = $request->input('permissions');
        if(!empty($permissions)){
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }
        return redirect()->back()->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(is_null($this->admin) || !$this->admin->can('role.delete')) {
            abort(403, 'Sorry !! You are Unauthorized');
        }
        $role = Role::findById($id, 'admin');
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
