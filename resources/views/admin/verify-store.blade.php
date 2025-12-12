@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Store Verification</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <table class="table-auto w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3 border">Store Name</th>
                <th class="p-3 border">Owner</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($stores as $store)
                <tr>
                    <td class="border p-3">{{ $store->name }}</td>
                    <td class="border p-3">{{ $store->user->name }}</td>
                    <td class="border p-3">
                        @if($store->is_verified)
                            <span class="text-green-600 font-bold">Verified</span>
                        @else
                            <span class="text-red-600 font-bold">Not Yet</span>
                        @endif
                    </td>
                    <td class="border p-3 flex gap-2">
                        <form method="POST" action="{{ route('admin.stores.verify', $store->id) }}">
                            @csrf
                            <button class="bg-green-500 text-white px-3 py-1 rounded">Verification</button>
                        </form>

                        <form method="POST" action="{{ route('admin.stores.reject', $store->id) }}">
                            @csrf
                            <button class="bg-red-500 text-white px-3 py-1 rounded">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection