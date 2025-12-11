<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <nav class="bg-orange-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('admin.home') }}" class="font-bold text-xl">Admin Panel</a>

            <div class="space-x-6 flex items-center">
                <a href="{{ route('admin.home') }}" class="hover:underline">HomePage</a>
                <a href="{{ route('admin.verify.index') }}" class="hover:underline">Verifikasi Toko</a>
                <a href="{{ route('admin.users.index') }}" class="hover:underline">Manajemen User & Store</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

</body>
</html>