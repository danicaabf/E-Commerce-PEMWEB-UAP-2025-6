@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Manage Orders</h1>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2">Order ID</th>
            <th class="p-2">Customer</th>
            <th class="p-2">Status</th>
            <th class="p-2">Total</th>
            <th class="p-2">Tracking</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr class="border-b">
            <td class="p-2">{{ $order->id }}</td>
            <td class="p-2">{{ $order->user->name }}</td>
            <td class="p-2">{{ ucfirst($order->status) }}</td>
            <td class="p-2">${{ number_format($order->total,2) }}</td>
            <td class="p-2">{{ $order->tracking_number ?? '-' }}</td>
            <td class="p-2">
                <a href="{{ route('seller.orders.edit', $order->id) }}" class="text-blue-600 hover:underline">Update</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection