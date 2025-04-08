<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::query()->getConnection()->table('user')->insert([
            'name' => 'Admin RBM',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'level' => 'SuperAdmin',
            'status' => 'Active',
        ]);
    }
}
