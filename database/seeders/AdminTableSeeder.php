<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $avatar = Avatar::create('John Doe');
        $filename = Str::uuid()->toString().''.'.png';
        $avatar->save(storage_path('app/public/images/users/' . $filename), 100);

        Admin::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'admin',
            'designation' => 'System Admin',
            'country' => 'California, United States',
            'avatar' => $filename,
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
