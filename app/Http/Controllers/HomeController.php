<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil kategori produk untuk fitur kategori di landing page
        $categories = ProductCategory::take(6)->get();

        // Ambil 8 produk terbaru
        $products = Product::with(['store', 'productImages'])
        ->latest()
        ->paginate(12);

        // Testimoni dummy
        $testimonials = [
            [
                'name' => 'Riko Saputra',
                'avatar' => '/imagesource/avatar1.png',
                'text' => 'Sepatunya nyaman banget! Pengiriman cepat dan kualitas 10/10.',
            ],
            [
                'name' => 'Aulia Setiana',
                'avatar' => '/imagesource/avatar2.png',
                'text' => 'Aku suka banget sama warna dan kenyamanannya. Recommended!',
            ],
            [
                'name' => 'Dimas Cahyono',
                'avatar' => '/imagesource/avatar3.png',
                'text' => 'Harga worth it, kualitas premium. Pasti order lagi!',
            ],
        ];

        return view('welcome', compact(
            'categories',
            'products',
            'testimonials'
        ));
    }
}
