@extends('layouts.app') 

@section('content')
<div x-data="{dark: false}" :class="dark ? 'dark' : ''" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    {{-- NAVBAR --}}
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <div class="flex items-center gap-6">
                    <a href="/" class="flex items-center gap-3">
                        <span class="font-bold text-xl text-orange-500">SoleMate</span>
                    </a>

                    {{-- MEGA MENU --}}
                    <nav class="hidden lg:flex items-center gap-4">
                        <div class="relative group">
                            <button class="px-3 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">Category</button>

                            <div class="absolute left-0 top-full mt-3 w-screen max-w-4xl transform scale-95 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all origin-top-left bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 ring-1 ring-black/5 z-50">
                                <div class="grid grid-cols-3 gap-6">
                                    <div>
                                        <h4 class="font-semibold mb-3">Sneakers</h4>
                                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                            <li><a href="{{ route('login') }}">Casual Sneakers</a></li>
                                            <li><a href="{{ route('login') }}">Premium Sneakers</a></li>
                                            <li><a href="{{ route('login') }}">Retro Collection</a></li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="font-semibold mb-3">Running</h4>
                                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                            <li><a href="{{ route('login') }}">Lightweight</a></li>
                                            <li><a href="{{ route('login') }}">Stability</a></li>
                                            <li><a href="{{ route('login') }}">Trail</a></li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="font-semibold mb-3">Brands</h4>
                                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                            <li><a href="{{ route('login') }}">Nike</a></li>
                                            <li><a href="{{ route('login') }}">Adidas</a></li>
                                            <li><a href="{{ route('login') }}">Local Brands</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">Product</a>
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">Sell</a>
                    </nav>
                </div>

                <div class="flex items-center gap-4">

                    {{-- DARK MODE --}}
                    <button @click="dark = !dark" class="p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition" aria-label="Toggle dark">
                        <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.66-11h-1M4.34 12h-1m14.36 6.36l-.7-.7M6.34 6.34l-.7-.7m12.02 12.02l-.7-.7M6.34 17.66l-.7-.7"/></svg>
                        <svg x-show="dark" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"><path d="M17.293 13.293a8 8 0 11-10.586-10.586 8 8 0 0010.586 10.586z"/></svg>
                    </button>

                    {{-- CART --}}
                    <a href="{{ route('login') }}" class="p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 8h12l-2-8M9 21a1 1 0 100-2 1 1 0 000 2zm6 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
                    </a>

                </div>
            </div>
        </div>
    </header>


    {{-- HERO --}}
    <section class="relative">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">

                {{-- SLIDE 1 --}}
                <div class="swiper-slide">
                    <div class="bg-black text-white py-28">
                        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-8">
                            <div class="flex-1">
                                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                                    Langkah Baru, <span class="text-orange-400">SoleMate</span> Baru
                                </h1>
                                <p class="mt-4 text-gray-300">Koleksi eksklusif sneakers & running terbaik tahun ini.</p>
                                <a href="{{ route('login') }}" class="mt-6 inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-md">
                                    Shop Now
                                </a>
                            </div>

                            <div class="flex-1">
                                <img src="/imagesource/hero-shoes.png" class="w-full max-w-md mx-auto">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 2 --}}
                <div class="swiper-slide">
                    <div class="bg-gradient-to-r from-orange-100 to-white py-28">
                        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-8">
                            <div class="flex-1">
                                <h2 class="text-3xl md:text-5xl font-bold">Diskon Musim Ini</h2>
                                <p class="mt-3 text-gray-700">Potongan sampai 30% untuk koleksi terpilih.</p>
                                <a href="{{ route('login') }}" class="mt-6 inline-block bg-black text-white px-6 py-3 rounded-md">
                                    View Promo
                                </a>
                            </div>

                            <div class="flex-1">
                                <img src="/imagesource/adidas-dame-8.jpg" class="w-full max-w-md mx-auto">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>


    {{-- PROMO --}}
    <section class="py-6 bg-orange-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h3 class="font-semibold">Gratis Ongkir untuk Pembelian > Rp 300.000</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Gunakan kode: <span class="font-mono">SOLEFREE</span>
                </p>
            </div>
            <a href="{{ route('login') }}" class="px-4 py-2 bg-orange-500 text-white rounded-md">Belanja Sekarang</a>
        </div>
    </section>


    {{-- KATEGORI --}}
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold">Kategori Unggulan</h2>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-6">

                <a href="{{ route('login') }}" class="block p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <img src="/imagesource/adidas-stan-smith.jpg" class="mx-auto w-32 h-32 object-cover rounded">
                    <h4 class="mt-4 font-semibold">Sneakers</h4>
                </a>

                <a href="{{ route('login') }}" class="block p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <img src="/imagesource/asics-gel-kayano.jpg" class="mx-auto w-32 h-32 object-cover rounded">
                    <h4 class="mt-4 font-semibold">Running</h4>
                </a>

                <a href="{{ route('login') }}" class="block p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <img src="/imagesource/bata-oxford.jpg" class="mx-auto w-32 h-32 object-cover rounded">
                    <h4 class="mt-4 font-semibold">Casual</h4>
                </a>

            </div>
        </div>
    </section>


    {{-- PRODUK TERBARU --}}
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">New Product</h2>
                <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-300">View All</a>
            </div>

            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach($products as $product)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4 hover:shadow-lg transition" data-aos="fade-up">

                    <a href="{{ route('login') }}">
                        <img src="{{ $product->primary_image_url ?? '/imagesource/placeholder.png' }}" class="w-full h-48 object-cover rounded">

                        <h3 class="mt-3 font-semibold">{{ Str::limit($product->name, 40) }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">{{ $product->store->name ?? 'Solemate Store' }}</p>

                        <div class="mt-2 flex items-center justify-between">
                            <div class="font-bold">Rp {{ number_format($product->price,0,',','.') }}</div>
                            <a href="{{ route('login') }}" class="px-3 py-1 bg-orange-500 text-white rounded">Buy</a>
                        </div>
                    </a>

                </div>
                @endforeach

            </div>

            <div class="mt-6">{{ $products->links() }}</div>
        </div>
    </section>


    {{-- TESTIMONIAL --}}
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold">Apa kata pelanggan</h2>

            <div class="swiper testimonial-swiper mt-8">
                <div class="swiper-wrapper">

                    @foreach($testimonials as $t)
                    <div class="swiper-slide">
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-6 mx-4 flex flex-col items-center">
                            <img src="{{ $t['avatar'] }}" class="w-16 h-16 rounded-full object-cover mb-4">
                            <p class="text-gray-700 dark:text-gray-200 text-sm italic">"{{ $t['text'] }}"</p>
                            <div class="mt-4 font-semibold">- {{ $t['name'] }}</div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="swiper-pagination mt-4"></div>
            </div>
        </div>
    </section>


    {{-- CTA --}}
    <section class="py-12 bg-orange-500 text-white text-center rounded-t-3xl">
        <div class="max-w-6xl mx-auto px-6">
            <h3 class="text-2xl font-bold">Siap melangkah dengan Solemate?</h3>
            <p class="mt-2">Dapatkan diskon & penawaran eksklusif</p>

            <form action="/subscribe" method="POST" class="mt-4 max-w-md mx-auto flex gap-2">
                @csrf
                <input name="email" type="email" placeholder="Masukkan email" required class="w-full px-4 py-2 rounded-l-md text-black">
                <button class="px-4 bg-black text-white rounded-r-md">Register</button>
            </form>
        </div>
    </section>


    {{-- FOOTER --}}
    <footer class="bg-black text-white py-8 mt-6">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <h4 class="font-bold text-orange-400">SoleMate</h4>
                <p class="text-sm text-gray-400 mt-2">Platform sepatu pilihanmu.</p>
            </div>

            <div>
                <h5 class="font-semibold">Help</h5>
                <ul class="mt-2 text-sm text-gray-400 space-y-1">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h5 class="font-semibold">Follow Us</h5>
                <div class="flex gap-3 mt-2">
                    <a href="#" class="text-orange-400">Instagram</a>
                </div>
            </div>
        </div>
    </footer>

</div>
@endsection


@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init({ duration: 700, once: true });

    new Swiper('.hero-swiper', {
        loop: true,
        autoplay: { delay: 5000 },
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
    });

    new Swiper('.testimonial-swiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 16,
        pagination: { el: '.testimonial-swiper .swiper-pagination', clickable: true },
        breakpoints: { 768: { slidesPerView: 2 } }
    });
</script>
@endsection