<x-app-layout>
    <div class="p-6">

        <h2 class="text-2xl font-bold mb-4">Wallet / Ballance</h2>

        <div class="p-4 bg-white shadow rounded mb-4">
            <p class="text-lg">Your Ballance:</p>
            <p class="text-3xl font-bold text-green-600">Rp {{ number_format($saldo,0,',','.') }}</p>
        </div>

        <h3 class="text-xl font-bold mb-2">Topup History</h3>

        <table class="w-full bg-white shadow rounded">
            <tr class="border-b">
                <th class="p-2">Code</th>
                <th class="p-2">Amount</th>
                <th class="p-2">Method</th>
                <th class="p-2">Status</th>
            </tr>

            @foreach ($topups as $t)
            <tr class="border-b">
                <td class="p-2">{{ $t->reference }}</td>
                <td class="p-2">Rp {{ number_format($t->amount) }}</td>
                <td class="p-2">{{ ucfirst($t->method) }}</td>
                <td class="p-2">{{ $t->status }}</td>
            </tr>
            @endforeach

        </table>

    </div>
</x-app-layout>