@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-orange-600">All Products</h1>

        <form method="GET" action="{{ route('products.index') }}" class="flex gap-2">
            <input name="search" value="{{ request('search') }}" placeholder="Search..."
                   class="border rounded px-3 py-2" />
            <button class="bg-orange-600 text-white px-4 py-2 rounded">Search</button>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $p)
            <div class="bg-white rounded-2xl shadow p-4 flex flex-col">

                <a href="{{ route('products.show', $p->slug ?? $p->id) }}" class="block">

                    {{-- IMAGE REMOVED ON PURPOSE (no image to display) --}}
                    <div class="h-48 flex items-center justify-center bg-gray-100 rounded-lg overflow-hidden">
                        <div class="text-center text-gray-500 px-4">
                            <div class="text-lg font-semibold">{{ Str::limit($p->name, 40) }}</div>
                            <div class="text-sm mt-2">(image disabled)</div>
                        </div>
                    </div>

                    <h3 class="mt-3 font-semibold text-gray-900 truncate">
                        {{ $p->name }}
                    </h3>

                    <div class="mt-2 flex items-center justify-between">
                        <div class="text-orange-500 font-bold">
                            Rp {{ number_format($p->price ?? 0,0,',','.') }}
                        </div>
                        <div class="text-sm text-gray-400">
                            {{ optional($p->productCategory)->name ?? '-' }}
                        </div>
                    </div>
                </a>

                <div class="mt-4 flex gap-2">
                    <a href="{{ route('products.show', $p->slug ?? $p->id) }}"
                       class="flex-1 text-center py-2 rounded bg-orange-600 text-white">
                       View
                    </a>
                    <button class="flex-1 py-2 rounded border" type="button" disabled>Add</button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-10">No products found.</div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $products->withQueryString()->links() }}
    </div>
</div>
@endsection
