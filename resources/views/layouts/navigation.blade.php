<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- BRAND --}}
            <div class="flex items-center">
                <a href="/" class="text-orange-600 text-lg font-bold">E-Commerce</a>
            </div>

            
            {{-- MENU KIRI --}}
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                @auth
                {{-- DASHBOARD --}}
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-nav-link>

                {{-- ⭐ ADMIN ONLY --}}
                @if(Auth::user()->role == 'admin')
                    <x-nav-link href="/admin/users">Users</x-nav-link>
                    <x-nav-link href="/admin/verification">Verify Shop</x-nav-link>
                    <x-nav-link href="/admin/reports">Reports</x-nav-link>
                @endif

                {{-- ⭐ SELLER ONLY --}}
                @if(Auth::user()->role == 'seller')
                    <x-nav-link href="/seller/profile">My Store</x-nav-link>
                    <x-nav-link href="/seller/products">Products</x-nav-link>
                    <x-nav-link href="/seller/orders">Orders</x-nav-link>
                @endif

                {{-- ⭐ MEMBER ONLY --}}
                @if(Auth::user()->role == 'member')

                    {{-- Checkout --}}
                    <x-nav-link :href="route('checkout.index', ['id' => 1])">
                        Checkout
                    </x-nav-link>

                    {{-- Riwayat Transaksi --}}
                    <x-nav-link href="{{ route('transactions.history') }}">
                        Riwayat Transaksi
                    </x-nav-link>

                    {{-- Wallet / Saldo --}}
                    <x-nav-link href="/member/wallet">
                        Wallet
                    </x-nav-link>

                    {{-- Topup Saldo --}}
                    <x-nav-link :href="route('topup.index')" 
                                :active="request()->routeIs('topup.index')">
                        TopUp Saldo
                    </x-nav-link>

                @endif

                @endauth
            </div>



            {{-- RIGHT AREA --}}
            <div class="hidden sm:flex sm:items-center">

                {{-- GUEST --}}
                @guest
                <a href="{{ route('login') }}" class="px-4">Login</a>
                <a href="{{ route('register') }}" class="px-4 text-orange-600 font-semibold">Register</a>
                @endguest


                {{-- LOGGED IN --}}
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="px-3 py-2 border rounded">
                            {{ Auth::user()->name }}
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link 
                                onclick="event.preventDefault();this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth

            </div>
        </div>
    </div>
</nav>
