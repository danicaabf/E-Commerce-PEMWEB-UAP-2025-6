<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();

        // Cek role user, pilih view sesuai role
        if (auth()->user()->role === 'seller') {
            return view('seller.categories.index', compact('categories'));
        }

        // Default member
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = ProductCategory::with('products.productImages', 'products.store')->findOrFail($id);

        if (auth()->user()->role === 'seller') {
            return view('seller.categories.show', compact('category'));
        }

        return view('category', compact('category')); // untuk member
    }
}