<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'admin',
            'designation' => 'System Admin',
            'country' => 'California, United States',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
