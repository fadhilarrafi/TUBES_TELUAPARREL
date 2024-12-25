<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Membuat user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),  // Password admin
            'role' => 'admin',  // Mengatur role sebagai admin
        ]);

        // Membuat user biasa
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('user'),  // Password user
            'role' => 'user',  // Mengatur role sebagai user
        ]);
    }
}
