@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Management User & Store</h1>

<h2 class="text-xl font-semibold mb-2">User List</h2>
<table class="min-w-full bg-white border mb-8">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
        <tr class="border-b">
            <td class="p-3">{{ $u->name }}</td>
            <td class="p-3">{{ $u->email }}</td>
            <td class="p-3">{{ $u->role }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2 class="text-xl font-semibold mb-2">Store List</h2>
<table class="min-w-full bg-white border">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Store Name</th>
            <th class="p-3">Owner</th>
            <th class="p-3">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stores as $s)
        <tr class="border-b">
            <td class="p-3">{{ $s->name }}</td>
            <td class="p-3">
                {{ $s->owner ? $s->owner->name : 'Tidak ada owner' }}
            </td>
            <td class="p-3">
                @if($s->is_verified)
                    <span class="text-green-600 font-bold">Verified</span>
                @else
                    <span class="text-red-600 font-bold">Pending</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection