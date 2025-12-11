<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;

class VerifyStoreController extends Controller
{
    // tampilkan toko-toko yang belum diverifikasi
    public function index()
    {
        // kirim variabel $stores supaya view kompatibel
        $stores = Store::where('is_verified', false)->get();

        return view('admin.verification', compact('stores'));
    }

    // approve pakai route-model-binding
    public function approve(Store $store): RedirectResponse
    {
        $store->update(['is_verified' => true]);

        return back()->with('success', 'Toko berhasil diverifikasi.');
    }

    // reject (hapus atau ubah status sesuai kebutuhan)
    public function reject(Store $store): RedirectResponse
    {
        // kalau mau tidak menghapus, bisa set status lain; contoh dihapus:
        $store->delete();

        return back()->with('success', 'Toko ditolak dan dihapus.');
    }
}