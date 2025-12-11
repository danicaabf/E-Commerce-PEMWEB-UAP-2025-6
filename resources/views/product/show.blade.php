@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">

    <div class="bg-white shadow-lg p-6 rounded-xl grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- GAMBAR PRODUK -->
        <div class="flex justify-center">
            <img src="{{ asset('imagesource/' . $product->image) }}" 
                 class="w-80 rounded-lg shadow-md">
        </div>

        <!-- DETAIL PRODUK -->
        <div>
            <h1 class="text-3xl font-bold">{{ $product->name }}</h1>

            <p class="text-2xl text-orange-600 font-bold mt-3">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>

            <p class="mt-6 text-gray-700 leading-relaxed">
                {{ $product->description }}
            </p>

            <p class="mt-4 text-sm text-gray-500">
                Stok: <b>{{ $product->stock }}</b>
            </p>

            <!-- TOMBOL CHECKOUT -->
            <a href="{{ route('checkout.index', $product->id) }}">
                <button class="mt-8 bg-orange-600 text-white px-6 py-3 rounded-lg 
                               hover:bg-orange-700 transition-all">
                    Checkout Sekarang
                </button>
            </a>

            <!-- KEMBALI -->
            <div class="mt-4">
                <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline">
                    &larr; Kembali
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
