<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [1, 'imagesource/nike-air-force-1.png'],
            [2, 'imagesource/adidas-stan-smith.jpg'],
            [3, 'imagesource/bata-oxford-classic.jpg'],
            [4, 'imagesource/clarks-men-leather-formal.jpg'],
            [5, 'imagesource/asics-gel-kayano.jpg'],
            [6, 'imagesource/nike-pegasus-40.jpg'],
            [7, 'imagesource/nike-lebron-witness.jpg'],
            [8, 'imagesource/adidas-dame-8.jpg'],
            [9, 'imagesource/dr-martens-1460.jpg'],
            [10, 'imagesource/timberland-classic-boot.jpg'],
        ];

        foreach ($images as $img) {
            ProductImage::create([
                'product_id' => $img[0],
                'image' => $img[1],
                'is_thumbnail' => true, 
            ]);
        }
    }
}