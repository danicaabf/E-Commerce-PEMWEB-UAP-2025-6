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
            <a href="{{ route('dashboard') }}" class="font-bold text-xl">E-Commerce</a>
            <div class="space-x-4 flex items-center">
                <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('store.index') }}" class="hover:underline">Store</a>
                <a href="{{ route('categories.index') }}" class="hover:underline">Category</a>
                <a href="{{ route('orders.index') }}" class="hover:underline">Orders</a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">
                        Logout
                    </button>
                </form>
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