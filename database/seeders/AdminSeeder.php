<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'nama' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Gunakan Hash agar password aman
            'role' => 'super_admin',
        ]);

        Admin::create([
            'nama' => 'Admin Biasa',
            'email' => 'admin2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}
