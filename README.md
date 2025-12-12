Kelompok 6
- Putri Dewi Natalia Wijayanti (245150601111012)
- Danica Adristi Beryl Fausta (245150601111009)

Deskripsi Proyek E-Commerce “SoleMate”
SoleMate merupakan platform e-commerce yang dirancang untuk jual-beli sepatu secara online. Tujuan utamanya adalah memudahkan pengguna dalam berbelanja, memberikan pengalaman transaksi yang aman, dan menyediakan fitur interaktif. Selain itu, penjual dapat membuat toko sendiri, mengelola produk, serta mendapatkan laporan transaksi dengan mudah.

Alasan Dibuat
- Mempermudah pengguna dalam proses belanja sepatu online.
- Memberikan dashboard bagi penjual untuk mengelola toko, produk, dan transaksi.
- Memudahkan admin dalam memantau dan memverifikasi toko yang terdaftar.
- Menyediakan sistem pembayaran melalui saldo digital atau Virtual Account (VA) agar lebih praktis.

Fitur Utama
1. Role Based Access Control (RBAC)
- Admin: Mengelola semua pengguna, toko, dan melakukan verifikasi toko baru.
- Seller/Member: Membuat toko, mengunggah produk, mengatur kategori, dan memantau pesanan.
- Customer: Melakukan pembelian produk, mengecek riwayat transaksi, serta melakukan top-up saldo.

2. Halaman & Fungsionalitas
- Homepage: Menampilkan seluruh produk dengan opsi filter berdasarkan kategori.
- Halaman Produk: Menampilkan detail produk, galeri gambar, informasi toko, dan tombol beli.
- Checkout: Memilih alamat pengiriman, metode shipping, dan opsi pembayaran (Saldo atau VA).
- Riwayat Transaksi: Meninjau semua transaksi sebelumnya.
- Seller Dashboard: CRUD untuk toko, produk, kategori, pesanan, dan saldo toko.
- Admin Dashboard: Mengelola pengguna, toko, dan memverifikasi pendaftaran toko.

3. Sistem Pembayaran
- Wallet/Saldo: Pengguna dapat melakukan top-up saldo terlebih dahulu untuk pembayaran lebih cepat.
- Virtual Account (VA): Setiap transaksi mendapatkan kode unik untuk transfer.
- Dedicated Payment Page: Halaman khusus untuk konfirmasi pembayaran dengan jelas dan aman.

4. Tampilan & UX
- Menggunakan tema modern dengan dark mode dan desain responsif untuk berbagai perangkat.
- Fitur filter produk, promo, dan testimonial untuk meningkatkan interaktivitas.
- Hero banner dan testimonial menggunakan swiper untuk tampilan yang lebih menarik.

Teknologi
- Backend: Laravel 12 (PHP)
- Frontend: Blade, TailwindCSS, Alpine.js
- Database: MySQL (menggunakan migration & seeder)
- Build Tools: Vite, npm

Kesimpulan
SoleMate menghadirkan pengalaman belanja sepatu online yang praktis dan efisien bagi semua pihak, baik customer, seller, maupun admin. Dari sisi pengembangan, proyek ini menguji kemampuan implementasi CRUD, RBAC, dan integrasi sistem pembayaran digital dengan penerapan konsep MVC yang rapi dan mudah dipelihara.