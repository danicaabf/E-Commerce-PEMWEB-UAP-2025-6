@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Store Verification</h1>

@if($stores->isEmpty())
    <p class="text-gray-600">Tidak ada toko yang menunggu verifikasi.</p>
@else
<table class="min-w-full bg-white border rounded">
    <thead class="bg-orange-600 text-white">
        <tr>
            <th class="p-3 text-left">Store Name</th>
            <th class="p-3 text-left">Owner</th>
            <th class="p-3 text-left">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stores as $store)
        <tr class="border-b">
            <td class="p-3">{{ $store->name }}</td>
            <td class="p-3">{{ $store->user->name }}</td>
            <td class="p-3">
                <form method="POST" class="inline" action="{{ route('admin.verify.approve', $store->id) }}">
                    @csrf
                    <button class="px-3 py-1 bg-green-600 text-white rounded">Approve</button>
                </form>

                <form method="POST" class="inline" action="{{ route('admin.verify.reject', $store->id) }}">
                    @csrf
                    <button class="px-3 py-1 bg-red-600 text-white rounded">Reject</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection