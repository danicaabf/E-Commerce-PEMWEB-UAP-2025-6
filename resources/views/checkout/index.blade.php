@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#FFF9F5] py-10">

    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow">

        <h2 class="text-3xl font-bold mb-5 text-orange-600">
            Checkout Produk
        </h2>

        <div class="flex gap-5 items-center">

            {{-- GAMBAR PRODUK --}}
            @if ($product->productImages->first())
                <img src="{{ asset('imagesource/'.$product->productImages->first()->image) }}"
                     class="w-32 h-32 object-contain">
            @else
                <img src="{{ asset('imagesource/noimage.png') }}"
                     class="w-32 h-32 object-contain opacity-50">
            @endif

            {{-- INFO PRODUK --}}
            <div>
                <p class="text-xl font-semibold">{{ $product->name }}</p>
                <p class="text-orange-600 font-bold text-lg">
                    Rp {{ number_format($product->price,0,',','.') }}
                </p>
            </div>

        </div>

        {{-- FORM CHECKOUT --}}
        <form action="{{ route('checkout.process', $product->id) }}" method="POST" class="mt-5">
            @csrf

            <h3 class="text-xl font-bold mb-2">Pilih Metode Pembayaran</h3>

            <select name="payment_method" class="w-full border p-2 rounded mb-4" required>
                <option value="saldo">Saldo</option>
                <option value="ewallet">E-Wallet</option>
                <option value="va">Virtual Account</option>
            </select>

            {{-- BUTTON BAYAR --}}
            <button type="submit"
                class="mt-6 w-full bg-gradient-to-b from-[#FF8540] to-[#FF6500]
                       text-white py-3 rounded-xl font-bold shadow">
                Bayar Sekarang
            </button>
        </form>

    </div>

</div>

@endsection
