@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto mt-10 bg-white p-8 shadow-lg rounded-xl">

    {{-- SALDO REALTIME --}}
    <div class="mb-6 p-4 bg-orange-100 border-l-4 border-orange-600 rounded">
        <p class="text-lg font-semibold text-orange-700">
            Saldo Anda Saat Ini :
            <span class="text-2xl font-bold">Rp {{ number_format(auth()->user()->saldo, 0, ',', '.') }}</span>
        </p>
    </div>

    <h2 class="text-2xl font-bold mb-6 text-orange-600">Top Up Saldo</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan error --}}
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('topup.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Jumlah Top Up</label>
            <input type="number" name="amount" class="w-full border p-2 rounded"
                   placeholder="Masukkan nominal" required>
        </div>

        {{-- METODE PEMBAYARAN --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Metode Pembayaran</label>
            <select name="method" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Metode --</option>
                <option value="ewallet">E-Wallet (DANA/OVO/ShopeePay)</option>
                <option value="va">Virtual Account</option>
                <option value="bank">Transfer Bank</option>
            </select>
        </div>

        <button class="bg-orange-600 text-white px-5 py-2 rounded hover:bg-orange-700">
            Top Up Sekarang
        </button>

    </form>

</div>

@endsection
