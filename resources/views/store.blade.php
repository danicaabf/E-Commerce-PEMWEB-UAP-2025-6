@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-orange-600">Store</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
        <div class="border rounded-lg p-4 shadow hover:shadow-lg transition">

            {{-- Gambar --}}
            <img 
                src="{{ asset(optional($product->productImages->first())->image ?? 'imagesource/default.jpg') }}" 
                alt="{{ $product->name }}" 
                class="w-full h-48 object-cover rounded">

            {{-- Nama --}}
            <h2 class="text-xl font-semibold mt-2">
                {{ $product->name ?? 'Nama Produk' }}
            </h2>

            {{-- Kategori --}}
            <p class="text-gray-500 text-sm">
                Kategori: {{ $product->productCategory->name ?? 'Tidak ada kategori' }}
            </p>

            {{-- Store --}}
            <p class="text-gray-500 text-sm">
                Toko: {{ $product->store->name ?? 'Tidak ada store' }}
            </p>

            {{-- Harga --}}
            <p class="text-gray-700 mt-1">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>

            {{-- Tombol --}}
            <a href="{{ route('store.show', $product->id) }}" 
                class="mt-3 inline-block bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">
                Lihat
            </a>
        </div>

        @empty
            <p class="text-gray-600">Belum ada produk tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
