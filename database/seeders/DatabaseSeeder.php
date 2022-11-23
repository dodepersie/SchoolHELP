<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
      User::create([
        'staff_id' => 'Agent 007',
        'username' => 'admin',
        'password' => Hash::make('admin'),
        'full_name' => 'Admin',
        'email' => 'admin@gmail.com',
        'phone_number' => '12345678',
        'position' => 'Super Admin',
        'role_user' => 'super_admin',
      ]);
    }
}
