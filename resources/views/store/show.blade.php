@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#FFF8F3] py-16">

    {{-- Store Title --}}
    <h1 class="text-center text-4xl font-extrabold text-[#FF6500] mb-4 tracking-wide">
        {{ $store->name }}
    </h1>

    {{-- Address --}}
    @if($store->address)
        <p class="text-center text-gray-500 mb-12">
            {{ $store->address }}
        </p>
    @endif

    <div class="container mx-auto">

        {{-- No Products --}}
        @if($products->count() == 0)
            <p class="text-center text-gray-500 text-lg">
                Belum ada produk di store ini 😁
            </p>
        @endif

        {{-- Product Grid --}}
        <div class="grid gap-10 justify-center
            grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            @foreach($products as $product)

            <div class="bg-white w-72 rounded-3xl overflow-hidden
                shadow-[0_4px_20px_rgba(0,0,0,0.07)]
                hover:shadow-[0_15px_35px_rgba(0,0,0,0.12)]
                transition-all duration-300">

                {{-- Product Image --}}
                <div class="h-48 flex justify-center items-center bg-white">
                    @if($product->productImages->first())
                        <img src="{{ asset('imagesource/'.$product->productImages->first()->image_path) }}"
                             class="max-h-40 object-contain">
                    @else
                        <img src="{{ asset('imagesource/noimage.png') }}"
                             class="max-h-40 opacity-60">
                    @endif
                </div>

                {{-- Product Detail --}}
                <div class="px-6 py-5 text-center">

                    <p class="font-semibold text-gray-900 text-lg">
                        {{ $product->name }}
                    </p>

                    <p class="text-[#FF6500] font-bold text-xl mt-2">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </p>

                    {{-- Button --}}
                    <a href="{{ route('products.show', $product->id) }}"
                        class="mt-5 block px-5 py-2.5 rounded-full bg-gradient-to-b
                        from-[#FFA45B] to-[#FF6500] text-white text-sm font-bold shadow-md hover:scale-105 transition">
                        Lihat Produk
                    </a>

                </div>

            </div>

            @endforeach
        </div>

    </div>

</div>

@endsection
