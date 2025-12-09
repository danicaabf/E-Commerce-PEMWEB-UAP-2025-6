<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\User;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user pertama dengan role 'member' sebagai owner store
        $user = User::where('role', 'member')->first();

        if ($user) {
            Store::create([
                'user_id' => $user->id,
                'name' => 'UrbanShoes',
                'logo' => 'urban-shoes-logo.png', // pastikan file logo ada di public/images atau storage
                'about' => 'UrbanShoes adalah toko sepatu modern yang menyediakan berbagai jenis sepatu untuk semua kalangan.',
                'phone' => '081234567890',
                'address_id' => 'ID-STORE-001',
                'city' => 'Malang',
                'address' => 'Jl. Soekarno-Hatta No. 123, Malang',
                'postal_code' => '65145',
                'is_verified' => true,
            ]);
        } else {
            $this->command->info('Tidak ada user dengan role member. Tambahkan user terlebih dahulu!');
        }
    }
}
