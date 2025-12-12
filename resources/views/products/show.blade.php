@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-16 px-6 grid grid-cols-1 md:grid-cols-2 gap-12">

    {{-- LEFT SIDE (IMAGE DISABLED) --}}
    <div class="w-full h-80 bg-gray-100 rounded-xl flex items-center justify-center text-center p-6">
        <div>
            <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
            <p class="text-sm text-gray-500 mt-2">(product images disabled)</p>
        </div>
    </div>

    {{-- RIGHT SIDE --}}
    <div>
        <h1 class="text-4xl font-bold text-gray-900">{{ $product->name }}</h1>

        <p class="text-2xl text-orange-600 font-bold mt-3">
            Rp {{ number_format($product->price, 0, ',', '.') }}
        </p>

        <p class="mt-4">
            <span class="font-semibold">Category:</span>
            {{ $product->category->name ?? 'No category' }}
        </p>

        <p class="mt-6 text-gray-700">
            {{ $product->description }}
        </p>

        {{-- BUTTONS --}}
        <div class="mt-10 flex gap-4">

            {{-- BUY NOW --}}
            <form action="{{ route('checkout.index', $product->id) }}" method="GET">
                <button
                    type="submit"
                    class="px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white rounded-lg font-semibold">
                    Buy Now
                </button>
            </form>

            {{-- ADD TO CART --}}
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="px-6 py-3 border border-gray-400 hover:bg-gray-100 rounded-lg font-semibold">
                    Add to Cart
                </button>
            </form>

        </div>

        <div class="mt-6">
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">Back to products</a>
        </div>

    </div>
</div>
@endsection
