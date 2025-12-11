@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-orange-600">Pesanan Saya</h1>
    
    @if($orders->isEmpty())
        <p class="text-gray-700">Belum ada pesanan.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg shadow">
                <thead class="bg-orange-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">ID Pesanan</th>
                        <th class="py-3 px-6 text-left">Produk</th>
                        <th class="py-3 px-6 text-left">Jumlah</th>
                        <th class="py-3 px-6 text-left">Total</th>
                        <th class="py-3 px-6 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $order->id }}</td>
                        <td class="py-3 px-6">{{ $order->product->name ?? 'Produk tidak tersedia' }}</td>
                        <td class="py-3 px-6">{{ $order->quantity }}</td>
                        <td class="py-3 px-6">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="py-3 px-6">{{ ucfirst($order->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
