@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>

    {{-- semua gambar --}}
    <div class="flex gap-4 flex-wrap">
        @foreach($product->productImages as $img)
            <img src="{{ asset($img->image) }}" class="w-40 h-40 object-cover rounded">
        @endforeach
    </div>

    <p class="mt-4 text-gray-500">
        Kategori: {{ $product->productCategory->name ?? 'N/A' }}
    </p>

    <p class="text-gray-500">
        Toko: {{ $product->store->name ?? 'N/A' }}
    </p>

    <p class="text-2xl font-bold mt-4">
        Rp {{ number_format($product->price,0,',','.') }}
    </p>

</div>
@endsection