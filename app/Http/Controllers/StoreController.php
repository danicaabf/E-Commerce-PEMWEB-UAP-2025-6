<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::with(['productImages', 'productCategory', 'store'])->get();
        return view('store.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with(['productImages','productCategory','store'])->findOrFail($id);

        return view('store.show', compact('product'));
    }
}
