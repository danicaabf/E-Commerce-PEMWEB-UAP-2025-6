<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Nike Air Force 1',
            'price' => 1500000,
            'stock' => 10,
            'description' => 'Sneakers klasik yang cocok untuk gaya kasual.'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Adidas Stan Smith',
            'price' => 1400000,
            'stock' => 12,
            'description' => 'Sneakers minimalis dengan desain ikonik.'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Bata Oxford Classic',
            'price' => 850000,
            'stock' => 8,
            'description' => 'Sepatu formal dengan desain Oxford elegan.'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Clarks Men Leather Formal',
            'price' => 1200000,
            'stock' => 6,
            'description' => 'Sepatu kulit formal yang nyaman untuk dipakai sepanjang hari.'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Asics Gel Kayano',
            'price' => 1800000,
            'stock' => 10,
            'description' => 'Running shoes premium dengan cushioning maksimal.'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Nike Pegasus 40',
            'price' => 1700000,
            'stock' => 12,
            'description' => 'Sepatu lari yang ringan dan responsif.'
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Nike Lebron Witness',
            'price' => 1600000,
            'stock' => 7,
            'description' => 'Sepatu basket dengan support kuat dan stabil.'
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Adidas Dame 8',
            'price' => 1500000,
            'stock' => 9,
            'description' => 'Sepatu basket nyaman dengan grip yang baik.'
        ]);

        Product::create([
            'category_id' => 5,
            'name' => 'Dr. Martens 1460',
            'price' => 2400000,
            'stock' => 5,
            'description' => 'Boots legendaris berbahan kulit premium.'
        ]);

        Product::create([
            'category_id' => 5,
            'name' => 'Timberland Classic Boot',
            'price' => 2600000,
            'stock' => 4,
            'description' => 'Boots tangguh dengan daya tahan tinggi.'
        ]);
    }
}