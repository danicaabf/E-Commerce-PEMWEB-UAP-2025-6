@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-3xl font-bold mb-6">Seller Dashboard 🛒</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg">Profil Toko</h3>
            <p class="mt-2">Kelola informasi toko, logo, dan detail rekening.</p>
            <a href="{{ route('store.index') }}" class="text-orange-600 hover:underline mt-2 inline-block">Kelola Profil</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg">Manajemen Kategori</h3>
            <p class="mt-2">CRUD kategori produk toko Anda.</p>
            <a href="{{ route('seller.categories.index') }}" class="text-orange-600 hover:underline mt-2 inline-block">Kelola Kategori</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg">Manajemen Produk</h3>
            <p class="mt-2">Tambah, edit, hapus produk dan gambar produk.</p>
            <a href="{{ route('seller.products.index') }}" class="text-orange-600 hover:underline mt-2 inline-block">Kelola Produk</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg">Manajemen Pesanan</h3>
            <p class="mt-2">Lihat daftar pesanan masuk dan update status pengiriman.</p>
            <a href="{{ route('seller.orders.index') }}" class="text-orange-600 hover:underline mt-2 inline-block">Kelola Pesanan</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg">Saldo Toko</h3>
            <p class="mt-2">Lihat saldo saat ini dan riwayat transaksi.</p>
            <a href="{{ route('seller.balance.index') }}" class="text-orange-600 hover:underline mt-2 inline-block">Cek Saldo</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg">Penarikan Dana</h3>
            <p class="mt-2">Ajukan penarikan dana dan lihat riwayat withdrawals.</p>
            <a href="{{ route('seller.withdrawals.index') }}" class="text-orange-600 hover:underline mt-2 inline-block">Kelola Penarikan</a>
        </div>
    </div>
</div>
@endsection