<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8">

        <h2 class="text-2xl font-bold mb-4">Riwayat Transaksi</h2>

        @forelse ($transactions as $trx)
        <div class="bg-white shadow rounded p-4 mb-3">
            <div class="flex justify-between">
                <div>
                    <p class="font-bold">{{ $trx->code }}</p>
                    <p>Toko: {{ $trx->store->name }}</p>
                    <p>Status Pembayaran: 
                        <span class="font-semibold text-orange-600">{{ $trx->payment_status }}</span>
                    </p>
                    <p>Total: Rp {{ number_format($trx->grand_total, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @empty
        <p class="text-gray-600">Belum ada transaksi.</p>
        @endforelse

    </div>
</x-app-layout>
