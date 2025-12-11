<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 shadow-lg rounded-xl">

        <h2 class="text-2xl font-bold mb-6 text-orange-600">Riwayat Transaksi</h2>

        @if($histories->isEmpty())
            <p class="text-gray-500">Belum ada transaksi.</p>
        @else
            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Tanggal</th>
                        <th class="p-2 border">Produk</th>
                        <th class="p-2 border">Total</th>
                        <th class="p-2 border">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($histories as $h)
                    <tr>
                        <td class="border p-2">{{ $h->created_at->format('d M Y') }}</td>
                        <td class="border p-2">{{ $h->product->name }}</td>
                        <td class="border p-2">Rp {{ number_format($h->total, 0, ',', '.') }}</td>
                        <td class="border p-2">{{ ucfirst($h->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</x-app-layout>
