<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My E-Commerce Store</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- Navbar --}}
    <nav class="bg-orange-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">

            {{-- Logo --}}
            <a href="{{ route('dashboard') }}" class="font-bold text-xl">SoleMate</a>

            <div class="space-x-6 flex items-center">
                
                {{-- Jika belum login --}}
                @guest
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="hover:underline">Register</a>
                @endguest

                {{-- Jika sudah login --}}
                @auth

                    {{-- ADMIN --}}
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.home') }}" class="hover:underline">Admin Dashboard</a>
                        <a href="{{ route('admin.verify.index') }}" class="hover:underline">Verification</a>
                        <a href="{{ route('admin.users.index') }}" class="hover:underline">Users</a>

                    {{-- SELLER --}}
                    @elseif(auth()->user()->role === 'seller')
                        <a href="{{ route('seller.dashboard') }}" class="hover:underline">Seller Dashboard</a>
                        <a href="{{ route('store.index') }}" class="hover:underline">My Store</a>

                    {{-- MEMBER --}}
                    @else
                        <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                        <a href="{{ route('store.index') }}" class="hover:underline">Store</a>
                        <a href="{{ route('categories.index') }}" class="hover:underline">Category</a>
                        <a href="{{ route('orders.index') }}" class="hover:underline">Orders</a>
                    @endif

                    {{-- LOGOUT --}}
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>

                @endauth

            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    <footer class="bg-gray-200 text-gray-700 p-4 text-center mt-6">
        &copy; {{ date('Y') }} My E-Commerce Store. All rights reserved.
    </footer>

</body>
</html>