<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        // =========================
        // ADMIN
        // =========================

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '081234567890',
            'role' => 'admin',
            'password' => Hash::make('123456')
        ]);



        // =========================
        // MITRA
        // =========================

        User::create([
            'name' => 'Mitra',
            'email' => 'mitra@gmail.com',
            'phone' => '081111111111',
            'role' => 'mitra',
            'password' => Hash::make('123456')
        ]);



        // =========================
        // USER
        // =========================

        User::create([
            'name' => 'Customer',
            'email' => 'user@gmail.com',
            'phone' => '082222222222',
            'role' => 'user',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'a',
            'email' => 'a@gmail.com',
            'phone' => '081111111111',
            'role' => 'mitra',
            'password' => Hash::make('123456')
        ]);

    }
}