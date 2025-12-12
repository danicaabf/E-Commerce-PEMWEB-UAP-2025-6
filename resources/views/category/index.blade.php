@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-black py-20">

    <h1 class="text-4xl font-extrabold text-white text-center mb-12 tracking-wide">
        Categories
    </h1>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
        @foreach($categories as $category)
        <a href="{{ route('categories.show', $category->id) }}"
           class="group relative rounded-2xl overflow-hidden shadow-lg bg-gray-800/40 backdrop-blur-lg hover:scale-105 transition transform duration-300">

            <img src="{{ $category->image ?? 'https://via.placeholder.com/300' }}"
                 class="h-40 w-full object-cover opacity-80 group-hover:opacity-100 transition duration-300" />

            <div class="p-5">
                <h2 class="text-xl font-bold text-white group-hover:text-yellow-400 transition">
                    {{ $category->name }}
                </h2>

                <p class="text-gray-400 text-sm mt-1">
                    {{ $category->products->count() }} Products
                </p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
