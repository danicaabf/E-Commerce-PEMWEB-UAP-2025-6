<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;

class StoreController extends Controller
{
    // =============== LIST SEMUA STORE ===============
    public function index()
    {
        $stores = Store::all();

        return view('store.index', compact('stores'));
    }

    // =============== DETAIL STORE + PRODUK ===============
    public function show($id)
    {
        $store = Store::findOrFail($id);

        $products = Product::where('store_id', $id)
            ->with(['productImages'])
            ->get();

        return view('store.show', compact('store', 'products'));
    }

    public function myStore() {
        $user = auth()->user();

        if (!$user->store) {
            return redirect()->route('store.index')->with('error', 'Kamu belum punya toko.');
        }

        $store = $user->store;
        $products = $store->products()->with('productImages')->get();

        return view('store.my', compact('store', 'products'));
    }
}
