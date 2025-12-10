@extends('layouts.main')

@section('content')
<div class="container py-5">
    <h2>Seller Dashboard 🛒</h2>

    <ul>
        <li><a href="/seller/profile">Profil Toko</a></li>
        <li><a href="/seller/categories">Manajemen Category</a></li>
        <li><a href="/seller/products">Manajemen Produk</a></li>
        <li><a href="/seller/orders">Pesanan Masuk</a></li>
        <li><a href="/seller/balance">Saldo Toko</a></li>
        <li><a href="/seller/withdrawals">Penarikan Saldo</a></li>
    </ul>
</div>
@endsection
