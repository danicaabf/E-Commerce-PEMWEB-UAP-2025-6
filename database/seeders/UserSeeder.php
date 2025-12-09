<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role'=> 'admin'
        ]);

        User::create([
            'name' => 'Seller User',
            'email' => 'seller@example.com',
            'password' => Hash::make('seller123'),
            'role'=> 'seller'
        ]);

        User::create([
            'name' => 'Member User',
            'email' => 'member@example.com',
            'password' => Hash::make('member123'),
            'role'=> 'member'
        ]);
    }
}