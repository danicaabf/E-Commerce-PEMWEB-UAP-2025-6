<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Ambil cart dari session
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika produk belum ada
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
                "image" => $product->image ?? null
            ];
        }

        // Simpan kembali ke session
        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart!');
    }
}
