@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white py-12">

    {{-- title --}}
    <h1 class="text-center text-4xl font-black mb-12 text-[#FF6500] tracking-widest">
        ALL STORE
    </h1>

    {{-- grid --}}
    <div class="container mx-auto grid gap-10 
        grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

        @foreach ($products as $product)

        {{-- card --}}
        <div class="bg-white rounded-3xl overflow-hidden shadow-[0px_4px_20px_rgba(0,0,0,0.05)]
            hover:shadow-[0px_8px_30px_rgba(0,0,0,0.08)]
            hover:-translate-y-1 transition-all duration-300">

            {{-- image --}}
            <div class="h-60 bg-white flex justify-center items-center relative">

                {{-- new tag --}}
                <span class="absolute top-3 right-3 bg-[#FF6500] text-white text-[10px] px-2 rounded">
                    NEW
                </span>

                <img src="{{ asset(optional($product->productImages->first())->image ?? '') }}"
                    class="max-h-44 object-contain transition duration-300 hover:scale-105">
            </div>

            {{-- text --}}
            <div class="px-6 pt-4 pb-6">

                <p class="uppercase text-[11px] tracking-wider text-gray-500">
                    {{ $product->productCategory->name ?? '' }}
                </p>

                <p class="text-[16px] font-semibold text-gray-900 mt-1 leading-tight">
                    {{ $product->name }}
                </p>

                <p class="font-bold text-[18px] text-gray-900 mt-4">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                {{-- checkout --}}
                <a href="{{ route('checkout.index', $product->id) }}"
                    class="mt-5 w-full block py-3 rounded-full bg-gradient-to-b
                    from-[#FF8540] to-[#FF6500] text-center font-bold text-white
                    hover:brightness-110 shadow-[0px_4px_10px_rgba(255,101,0,0.3)]
                    transition">
                    Checkout
                </a>

            </div>
        </div>

        @endforeach

    </div>

</div>

@endsection