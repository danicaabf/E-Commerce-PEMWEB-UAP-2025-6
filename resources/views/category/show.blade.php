@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-black via-gray-900 to-black py-16">

    {{-- CATEGORY HEADER --}}
    <div class="max-w-6xl mx-auto text-center mb-14">
        <h1 class="text-5xl font-extrabold text-white tracking-wide">
            {{ $category->name }}
        </h1>

        <p class="text-gray-400 mt-3">
            Explore the best products in this category
        </p>
    </div>

    {{-- PRODUCTS LIST --}}
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 px-6">
        @forelse($products as $product)
        <div class="group bg-gray-900/60 backdrop-blur-xl p-5 rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-gray-700/40">

            {{-- IMAGE --}}
            <div class="relative">
                <img 
                    src="{{ $product->image ?? 'https://via.placeholder.com/400' }}"
                    class="w-full h-48 object-cover rounded-xl group-hover:opacity-90 transition">

                {{-- WISHLIST HEART --}}
                <button class="absolute top-3 right-3 p-2 rounded-full bg-black/40 hover:bg-red-600 transition">
                    ❤️
                </button>
            </div>

            {{-- TITLE --}}
            <h2 class="mt-4 text-white font-bold text-lg group-hover:text-yellow-400 transition">
                {{ $product->name }}
            </h2>

            {{-- PRICE --}}
            <p class="text-yellow-400 font-bold text-xl mt-1">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>

            {{-- RATING --}}
            <div class="flex items-center gap-1 mt-2 text-yellow-400">
                ⭐ ⭐ ⭐ ⭐ ⭐
                <span class="text-gray-400 text-sm">(120 reviews)</span>
            </div>

            {{-- DESCRIPTION --}}
            <p class="text-gray-400 text-sm mt-3 line-clamp-2">
                {{ $product->description }}
            </p>

            {{-- BUTTONS --}}
            <div class="mt-5 flex justify-between items-center">
                <a href="{{ route('products.show', $product->id) }}"
                   class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black font-bold rounded-lg transition">
                    View
                </a>

                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
                    Add to Cart
                </button>
            </div>
        </div>

        @empty
        <div class="col-span-full text-center text-gray-400 text-xl py-20">
            No products available in this category.
        </div>
        @endforelse
    </div>
</div>
@endsection
