<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravolt\Avatar\Facade as Avatar;

class AdminService
{
    public function createNewAdmin(Request $request)
    {
        $filename = '';
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $filename = Str::uuid()->toString().'.'.$file->getClientOriginalExtension();
            $file->storeAs('images/users/', $filename, 'public');
        } else {
            $avatar = Avatar::create('John Doe');
            $filename = Str::uuid()->toString().'.png';
            $avatar->save(storage_path('app/public/images/users/'.$filename), 100);
        }

      $admin =  Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $filename,
            'designation' => $request->designation,
            'country' => $request->country,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'status' => $request->status,
        ]);

        if($request->roles){
            $admin->assignRole($request->roles);
        }

        return true;
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $filename = $admin->avatar;
        if ($request->file('avatar')) {
            Storage::disk('public')->delete('images/users/'.$admin->avatar);
            $file = $request->file('avatar');
            $filename = Str::uuid()->toString().'.'.$file->getClientOriginalExtension();
            $file->storeAs('images/users/', $filename, 'public');
        }

        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'avatar' => $filename,
            'designation' => $request->designation,
            'country' => $request->country,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'status' => $request->status,
        ]);
        $admin->roles()->detach();
        if($request->roles){
            $admin->assignRole($request->roles);
        }

        return true;
    }
}
