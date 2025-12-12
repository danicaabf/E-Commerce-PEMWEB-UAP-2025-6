@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Halo Admin!</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold">Total Member</h2>
        <p class="text-4xl font-bold text-orange-600">{{ $totalMembers }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold">Total Store</h2>
        <p class="text-4xl font-bold text-orange-600">{{ $totalStores }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold">Store Submission</h2>
        <p class="text-4xl font-bold text-orange-600">{{ $pendingStores }}</p>
    </div>
</div>
@endsection