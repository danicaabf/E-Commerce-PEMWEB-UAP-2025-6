<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['product_id' => 1, 'image_path' => 'imagesource/nike-air-force-1.png'],
            ['product_id' => 2, 'image_path' => 'imagesource/adidas-stan-smith.jpg'],
            ['product_id' => 3, 'image_path' => 'imagesource/bata-oxford.jpg'],
            ['product_id' => 4, 'image_path' => 'imagesource/clarks-formal.jpg'],
            ['product_id' => 5, 'image_path' => 'imagesource/asics-gel-kayano.jpg'],
            ['product_id' => 6, 'image_path' => 'imagesource/nike-pegasus.jpg'],
            ['product_id' => 7, 'image_path' => 'imagesource/nike-lebron-witness.jpg'],
            ['product_id' => 8, 'image_path' => 'imagesource/adidas-dame-8.jpg'],
            ['product_id' => 9,  'image_path' => 'imagesource/drmartens-1460.jpg'],
            ['product_id' => 10, 'image_path' => 'imagesource/timberland-classic.jpg'],
        ];

        foreach ($images as $img) {
            ProductImage::create($img);
        }
    }
}