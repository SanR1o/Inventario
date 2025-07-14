<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        user::create([
            'name' => 'Admin',
            'email' => 'admin@exmaple.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin']);
    }
}
