<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sneakers',
                'slug' => 'sneakers',
                'tagline' => 'Sepatu kasual & olahraga',
                'image' => 'sneakers.png',
                'description' => 'Kategori sepatu sneakers untuk olahraga, jalan santai, dan gaya casual sehari-hari.',
            ],
            [
                'name' => 'Formal Shoes',
                'slug' => 'formal-shoes',
                'tagline' => 'Sepatu resmi & kantor',
                'image' => 'formal-shoes.png',
                'description' => 'Kategori sepatu formal untuk kegiatan kantor, meeting, atau acara resmi.',
            ],
            [
                'name' => 'Sandals',
                'slug' => 'sandals',
                'tagline' => 'Sandal nyaman & stylish',
                'image' => 'sandals.png',
                'description' => 'Kategori sandal yang nyaman untuk aktivitas sehari-hari dan liburan.',
            ],
            [
                'name' => 'Running Shoes',
                'slug' => 'running-shoes',
                'tagline' => 'Sepatu lari & olahraga',
                'image' => 'running-shoes.png',
                'description' => 'Kategori sepatu khusus lari dan olahraga, ringan dan nyaman dipakai.',
            ],
            [
                'name' => 'Boots',
                'slug' => 'boots',
                'tagline' => 'Sepatu boots stylish & tangguh',
                'image' => 'boots.png',
                'description' => 'Kategori sepatu boots untuk gaya casual maupun kegiatan outdoor, tahan lama dan nyaman dipakai.',
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::firstOrCreate(
                ['slug' => $category['slug']], // cek berdasarkan slug
                $category
            );
        }
    }
}
