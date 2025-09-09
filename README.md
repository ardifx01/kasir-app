Kasir App Laravel
Aplikasi kasir (Point of Sale) modern berbasis web yang dibangun menggunakan Laravel 10 dan Tailwind CSS. Aplikasi ini dirancang untuk membantu pengelolaan produk dan transaksi penjualan harian.

(Anda bisa mengganti link di atas dengan tangkapan layar dari aplikasi Anda.)

Fitur Utama
Manajemen Produk (CRUD): Tambah, edit, hapus, dan lihat daftar produk dengan detail stok dan harga.

Sistem Kasir Interaktif: Antarmuka kasir yang responsif untuk mencari produk, menambahkan ke keranjang, dan menyelesaikan transaksi.

Pembayaran Fleksibel: Mendukung pembayaran tunai dengan perhitungan kembalian otomatis dan simulasi pembayaran digital.

Laporan Penjualan: Dashboard yang menampilkan ringkasan penjualan, total pendapatan, dan produk terlaris.

Riwayat Transaksi: Catatan lengkap dari semua transaksi yang telah terjadi.

Autentikasi & Otorisasi: Sistem login dengan peran pengguna (admin dan kasir) untuk mengelola hak akses.

Responsif Penuh: Tampilan aplikasi yang rapi dan optimal di desktop maupun perangkat mobile.

Teknologi yang Digunakan
Backend: PHP 8.1+, Laravel 10, MySQL

Frontend: HTML, Tailwind CSS, JavaScript (Vanilla JS), Vite

Library Tambahan: Toastify.js, Chart.js, maatwebsite/excel

Cara Menjalankan Proyek Secara Lokal
Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di komputer Anda.

Persyaratan
PHP 8.1 atau lebih tinggi

Composer

Node.js & npm

MySQL

Langkah-langkah
Clone Proyek:

Bash

git clone https://github.com/BekaGensss/kasir-app-laravel.git
cd kasir-app-laravel
Instal Dependensi:

Bash

composer install
npm install
Konfigurasi Environment:

Bash

cp .env.example .env
Atur konfigurasi database di file .env.

Jalankan Migrasi Database:

Bash

php artisan migrate
Jalankan Server:
Buka dua terminal terpisah.

Bash

# Terminal 1: untuk backend
php artisan serve
Bash

# Terminal 2: untuk frontend
npm run dev
Akses aplikasi di browser Anda: http://127.0.0.1:8000.

Kontributor
BekaGensss

Bara Kusuma.


Sumber dan konten terkait






