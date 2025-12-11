@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white py-12">

    {{-- TITLE --}}
    <h1 class="text-center text-4xl font-black mb-12 text-[#FF6500] tracking-widest">
        ALL STORES
    </h1>

    {{-- WRAPPER BIAR DI TENGAH --}}
    <div class="container mx-auto flex justify-center">

        {{-- GRID --}}
        <div class="grid gap-10
            grid-cols-1 sm:grid-cols-2 md:grid-cols-2">

            @foreach ($stores as $store)

            {{-- CARD --}}
            <div class="bg-white w-80 rounded-3xl overflow-hidden
                shadow-[0px_4px_20px_rgba(0,0,0,0.05)]
                hover:shadow-[0px_8px_30px_rgba(0,0,0,0.08)]
                hover:-translate-y-1 transition-all duration-300 mx-auto">

                {{-- IMAGE --}}
                <div class="h-60 bg-white flex justify-center items-center">

                  <img src="{{ asset('imagesource/' . ($store->logo ?? 'default.jpg')) }}"
                    class="max-h-44 object-contain transition duration-300 hover:scale-105">

                </div>

                {{-- TEXT --}}
                <div class="px-6 pt-4 pb-6">

                    <p class="uppercase text-[11px] tracking-wider text-gray-500">
                        Store
                    </p>

                    <p class="text-[16px] font-semibold text-gray-900 mt-1 leading-tight">
                        {{ $store->name }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $store->city }}
                    </p>

                    {{-- VISIT STORE --}}
                    <a href="{{ route('store.show', $store->id) }}"
                        class="mt-5 w-full block py-3 rounded-full bg-gradient-to-b
                        from-[#FF8540] to-[#FF6500] text-center font-bold text-white
                        hover:brightness-110 shadow-[0px_4px_10px_rgba(255,101,0,0.3)]
                        transition">
                        Visit Store
                    </a>

                </div>
            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection
