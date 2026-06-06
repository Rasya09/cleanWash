<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MitraLaundry;
use Illuminate\Support\Facades\Hash;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storeNames = [
            'CleanWash Pusat',
            'Klin Laundry Bandung',
            'Berkah Cuci Express',
            'Wangi Terus Laundry',
            'Kinclong Premium Wash'
        ];

        $ownerNames = [
            'Budi Santoso',
            'Siti Aminah',
            'Agus Pratama',
            'Rina Marlina',
            'Dodi Hermawan'
        ];

        // Foto toko yang tersedia (toko1 - toko5)
        $availableStorePhotos = [
            'mitra/store/toko1.jpg',
            'mitra/store/toko2.jpg',
            'mitra/store/toko3.jpg',
            'mitra/store/toko4.jpg',
            'mitra/store/toko5.jpg',
        ];

        for ($i = 1; $i <= 5; $i++) {
            $index = $i - 1;

            // 1. Buat atau Update Akun User
            $user = User::updateOrCreate(
                ['email' => "mitra{$i}@gmail.com"],
                [
                    'name' => $ownerNames[$index],
                    'password' => Hash::make('password'),
                    'role' => 'mitra',
                    'phone' => '08123456780' . $i,
                    'status' => 'active'
                ]
            );

            // 2. Pilih 3 foto toko secara acak (bisa duplikat jika tidak di-shuffle, tapi kita shuffle saja)
            $photos = $availableStorePhotos;
            shuffle($photos);
            $selectedPhotos = array_slice($photos, 0, 3); // Ambil 3 foto toko

            // 3. Buat atau Update Profil MitraLaundry
            MitraLaundry::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'owner_name' => $user->name,
                    'store_name' => $storeNames[$index],
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'description' => "Layanan laundry profesional dan tepercaya oleh {$storeNames[$index]}.",
                    'province' => 'Jawa Barat',
                    'city' => 'Bandung',
                    'district' => 'Coblong',
                    'village' => 'Dago',
                    'postal_code' => '40135',
                    'address' => "Jl. Ir. H. Juanda No. 1{$i}",
                    'status' => 'approved',
                    'logo' => "mitra/logo/logo{$i}.png",
                    'store_photos' => json_encode($selectedPhotos)
                ]
            );
        }
    }
}
