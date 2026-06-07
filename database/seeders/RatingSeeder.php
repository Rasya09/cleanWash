<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating;
use App\Models\User;

class RatingSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'user')->first();
        
        if (!$user) {
            $user = User::create([
                'name' => 'Dummy User',
                'email' => 'dummy@example.com',
                'phone' => '08999999999',
                'role' => 'user',
                'password' => bcrypt('password'),
            ]);
        }

        Rating::create([
            'user_id' => $user->id,
            'emoji' => 5,
            'star' => 5,
            'ulasan' => 'Aplikasi sangat membantu dan mudah digunakan!',
            'status' => 'ok',
            'created_at' => now()->subDays(2),
        ]);

        Rating::create([
            'user_id' => $user->id,
            'emoji' => 4,
            'star' => 4,
            'ulasan' => 'Pelayanan laundry cepat dan bersih.',
            'status' => 'wait',
            'created_at' => now()->subDays(1),
        ]);

        Rating::create([
            'user_id' => $user->id,
            'emoji' => 1,
            'star' => 1,
            'ulasan' => 'Ulasan spam ini.',
            'status' => 'spam',
            'created_at' => now(),
        ]);
    }
}
