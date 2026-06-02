<?php

namespace Database\Seeders;

use App\Models\MitraLaundry;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class MitraVerifikasiSeeder extends Seeder
{
    public function run(): void
    {
        if (MitraLaundry::where('status', 'pending')->exists()) {
            return;
        }

        $samples = [
            [
                'store_name' => 'Laundry Bersih Sejahtera',
                'owner_name' => 'Budi Santoso',
                'city' => 'Jakarta Selatan',
                'email' => 'bersihsejahtera@example.com',
                'phone' => '081234567890',
            ],
            [
                'store_name' => 'Quick Wash Laundry',
                'owner_name' => 'Andi Pratama',
                'city' => 'Bandung',
                'email' => 'quickwash@example.com',
                'phone' => '081312345678',
            ],
            [
                'store_name' => 'Fresh & Clean Laundry',
                'owner_name' => 'Siti Aisyah',
                'city' => 'Surabaya',
                'email' => 'freshclean@example.com',
                'phone' => '082198765432',
            ],
        ];

        foreach ($samples as $i => $data) {
            $userAttrs = [
                'name' => $data['owner_name'],
                'phone' => $data['phone'],
                'role' => 'user',
                'password' => Hash::make('password'),
            ];

            if (Schema::hasColumn('users', 'status')) {
                $userAttrs['status'] = 'active';
            }

            $user = User::firstOrCreate(
                ['email' => $data['email']],
                $userAttrs
            );

            MitraLaundry::create([
                'user_id' => $user->id,
                'owner_name' => $data['owner_name'],
                'store_name' => $data['store_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'description' => 'Laundry mitra contoh untuk uji verifikasi admin.',
                'address' => 'Jl. Contoh No.' . ($i + 1),
                'village' => 'Kelurahan Demo',
                'district' => 'Kecamatan Demo',
                'city' => $data['city'],
                'province' => 'Jawa',
                'postal_code' => '12345',
                'status' => 'pending',
            ]);
        }
    }
}
