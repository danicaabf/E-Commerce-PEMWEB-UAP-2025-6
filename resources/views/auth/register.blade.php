<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-orange-400 to-orange-700 px-4">

    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="/images/urbanshoes.png" class="w-28" alt="">
        </div>

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Registrasi Akun
        </h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" value="Nama" />
                <x-text-input id="name" type="text" name="name" class="w-full mt-1 bg-gray-100"
                    :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" type="email" name="email" class="w-full mt-1 bg-gray-100"
                    :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" type="password" name="password" class="w-full mt-1 bg-gray-100"
                    required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                <x-text-input id="password_confirmation" type="password"
                    name="password_confirmation" class="w-full mt-1 bg-gray-100" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button class="w-full bg-orange-500 text-white font-semibold py-3 rounded-lg hover:bg-orange-600 transition duration-200">
                Register
            </button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-6">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-orange-500 hover:underline">
                Login
            </a>
        </p>

    </div>
</div>

</x-guest-layout>