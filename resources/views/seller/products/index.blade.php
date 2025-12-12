@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Manage Products</h1>

<a href="{{ route('seller.products.create') }}" class="bg-orange-600 text-white px-4 py-2 rounded mb-4 inline-block">Add Product</a>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2">Name</th>
            <th class="p-2">Price</th>
            <th class="p-2">Category</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr class="border-b">
            <td class="p-2">{{ $product->name }}</td>
            <td class="p-2">${{ number_format($product->price,2) }}</td>
            <td class="p-2">{{ $product->category->name ?? '-' }}</td>
            <td class="p-2 text-center">
                <a href="{{ route('seller.products.edit', $product->id) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection