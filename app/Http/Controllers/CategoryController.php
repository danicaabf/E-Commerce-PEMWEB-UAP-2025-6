<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();

        // FIX TANPA MERAH
        $user = Auth::user();
        $role = $user ? $user->role : null;

        if ($role === 'seller') {
            return view('seller.categories.index', compact('categories'));
        }

        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = ProductCategory::with('products.productImages', 'products.store')
            ->findOrFail($id);

        // FIX TANPA MERAH
        $user = Auth::user();
        $role = $user ? $user->role : null;

        if ($role === 'seller') {
            return view('seller.categories.show', compact('category'));
        }

        return view('categories.show', compact('category'));
    }
}
