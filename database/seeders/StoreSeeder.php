<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\User;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'member')->first();

        if ($user) {

            // ===== STORE 1 =====
            Store::create([
                'user_id' => $user->id,
                'name' => 'UrbanShoes',
                'logo' => 'store1.png',
                'about' => 'UrbanShoes adalah toko sepatu modern.',
                'phone' => '081234567890',
                'address_id' => 'ID-STORE-001',
                'city' => 'Malang',
                'address' => 'Jl. Soekarno-Hatta No. 123, Malang',
                'postal_code' => '65145',
                'is_verified' => true,
            ]);

            // ===== STORE 2 =====
            Store::create([
                'user_id' => $user->id, 
                'name' => 'Sneaker',
                'logo' => 'store2.png',
                'about' => 'Sneaker menyediakan koleksi sepatu terbaru.',
                'phone' => '089876543210',
                'address_id' => 'ID-STORE-002',
                'city' => 'Surabaya',
                'address' => 'Jl. Ahmad Yani No. 10, Surabaya',
                'postal_code' => '60231',
                'is_verified' => true,
            ]);

        } else {
            $this->command->info('Tidak ada user dengan role member!');
        }
    }
}
