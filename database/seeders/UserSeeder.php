<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'name' => 'Staff1',
            'email' => 'staff@gmail.com',
            'is_admin' => 2,
            'password' => bcrypt('staff'),
        ]);
    }
}
