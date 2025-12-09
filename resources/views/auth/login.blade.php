<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-500 to-orange-700 px-4">

    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">

        <!-- LOGO -->
        <div class="flex justify-center mb-8">
            <img src="{{ asset('imagesource/urbanshoes.png') }}" class="w-32 mix-blend-multiply" alt="UrbanShoes Logo">
        </div>

        @if(session('status'))
            <div class="bg-green-600 text-white p-3 rounded mb-4 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Email</label>
                <input name="email" type="email"
                       class="w-full px-4 py-3 rounded border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-orange-400"
                       placeholder="you@example.com" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Password</label>
                <input name="password" type="password"
                       class="w-full px-4 py-3 rounded border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-orange-400"
                       placeholder="•••••••" required>
            </div>

            <button type="submit"
                class="w-full bg-orange-500 text-white font-semibold py-3 rounded-lg hover:bg-orange-600 transition duration-200">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-orange-500 hover:underline">
                Daftar sekarang
            </a>
        </p>
    </div>
</div>

</x-guest-layout>
