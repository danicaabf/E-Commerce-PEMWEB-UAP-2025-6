@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#FFF9F5] py-14">

    {{-- store title --}}
    <h1 class="text-center text-4xl font-black mb-12 text-[#FF6500] tracking-widest">
        {{ $store->name }}
    </h1>

    {{-- address jika ada --}}
    <p class="text-center text-gray-500 mb-16">
        {{ $store->address ?? '' }}
    </p>

    <div class="container mx-auto">

        @if($products->count() == 0)
            <p class="text-center text-gray-500 text-lg">
                Belum ada produk di store ini 😁
            </p>
        @endif

        <div class="grid gap-10 justify-center
            grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            @foreach($products as $product)

            <div class="bg-white w-72 rounded-3xl overflow-hidden
                shadow-[0px_5px_20px_rgba(0,0,0,0.05)]
                hover:shadow-[0px_15px_35px_rgba(0,0,0,0.08)]
                transition-all">

                {{-- product image --}}
                <div class="h-48 flex justify-center items-center bg-white">
                    @if($product->productImages->first())
                        <img src="{{ asset('imagesource/'.$product->productImages->first()->image) }}"
                             class="max-h-40 object-contain">
                    @else
                        <img src="{{ asset('imagesource/noimage.png') }}"
                             class="max-h-40 opacity-60">
                    @endif
                </div>

                <div class="px-5 py-4 text-center">

                    <p class="font-semibold text-gray-900">
                        {{ $product->name }}
                    </p>

                    <p class="text-orange-600 font-bold mt-2">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </p>

                    {{-- tombol lihat produk --}}
                    <a href="{{ route('product.show', $product->id) }}"
                        class="mt-4 block px-4 py-2 rounded-full bg-gradient-to-b
                        from-[#FF8540] to-[#FF6500] text-white font-bold">
                        Lihat Produk
                    </a>
                </div>

            </div>

            @endforeach
        </div>

    </div>

</div>

@endsection
