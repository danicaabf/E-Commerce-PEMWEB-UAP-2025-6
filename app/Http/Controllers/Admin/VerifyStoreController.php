<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class VerifyStoreController extends Controller
{
    // Menampilkan semua toko
    public function index()
    {
        $stores = Store::with('user')->get();
        return view('admin.verify-store', compact('stores'));
    }

    // Menerima verifikasi toko
    public function verify(Store $store)
    {
        $store->update(['is_verified' => 1]);

        return redirect()->back()->with('success', 'Store berhasil diverifikasi.');
    }

    // Menolak verifikasi toko
    public function reject(Store $store)
    {
        $store->update(['is_verified' => 0]);

        return redirect()->back()->with('error', 'Store ditolak.');
    }
}