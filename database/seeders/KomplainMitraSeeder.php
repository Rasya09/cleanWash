<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MitraLaundry;
use App\Models\Komplain;
use Illuminate\Support\Facades\Hash;

class KomplainMitraSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Pastikan ada Mitra yang sudah Approved
        $mitraUser = User::where('email', 'mitra_melapor@gmail.com')->first();
        if (!$mitraUser) {
            $mitraUser = User::create([
                'name' => 'Andi Laundry Specialist',
                'email' => 'mitra_melapor@gmail.com',
                'phone' => '081299887766',
                'role' => 'mitra',
                'password' => Hash::make('123456'),
                'status' => 'active'
            ]);
        }

        $mitraLaundry = MitraLaundry::where('user_id', $mitraUser->id)->first();
        if (!$mitraLaundry) {
            $mitraLaundry = MitraLaundry::create([
                'user_id' => $mitraUser->id,
                'owner_name' => 'Andi Pratama',
                'store_name' => 'Andi Clean Express',
                'email' => $mitraUser->email,
                'phone' => $mitraUser->phone,
                'address' => 'Jl. Veteran No. 45',
                'city' => 'Jakarta',
                'status' => 'approved',
            ]);
        }

        // 2. Pastikan ada Customer (User) yang akan dilaporkan
        $customer = User::where('email', 'customer_nakal@gmail.com')->first();
        if (!$customer) {
            $customer = User::create([
                'name' => 'Riko Pelanggan',
                'email' => 'customer_nakal@gmail.com',
                'phone' => '087766554433',
                'role' => 'user',
                'password' => Hash::make('123456'),
                'status' => 'active'
            ]);
        }

        // 3. Buat Komplain: Mitra melapor User
        // reporter_id = ID Mitra (User table)
        // reported_user_id = ID Customer (User table)
        Komplain::create([
            'reporter_id' => $mitraUser->id,
            'reported_user_id' => $customer->id,
            'mitra_laundry_id' => null, // Karena yang dilaporkan adalah USER, bukan laundry
            'alasan' => 'Pelanggan ini seringkali membatalkan pesanan secara sepihak saat kurir sudah berada di depan rumah. Sangat merugikan waktu dan biaya operasional kami.',
            'status' => 'pending',
        ]);

        echo "Seeder KomplainMitraSeeder berhasil dijalankan.\n";
    }
}
