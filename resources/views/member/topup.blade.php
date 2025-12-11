<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-8 shadow-lg rounded-xl">

        <h2 class="text-2xl font-bold mb-6 text-orange-600">Top Up Saldo</h2>

        <form action="{{ route('topup.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Jumlah Top Up</label>
                <input type="number" name="amount" class="w-full border p-2 rounded"
                       placeholder="Masukkan nominal" required>
            </div>

            <button class="bg-orange-600 text-white px-5 py-2 rounded hover:bg-orange-700">
                Top Up Sekarang
            </button>

        </form>

    </div>
</x-app-layout>
