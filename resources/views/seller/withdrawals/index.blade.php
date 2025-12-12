@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Withdrawals</h1>

<a href="{{ route('seller.withdrawals.create') }}" class="bg-orange-600 text-white px-4 py-2 rounded mb-4 inline-block">Request Withdrawal</a>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2">Date</th>
            <th class="p-2">Amount</th>
            <th class="p-2">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($withdrawals as $w)
        <tr class="border-b">
            <td class="p-2">{{ $w->created_at->format('d/m/Y') }}</td>
            <td class="p-2">${{ number_format($w->amount,2) }}</td>
            <td class="p-2">{{ ucfirst($w->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection