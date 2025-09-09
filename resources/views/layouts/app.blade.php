<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body class="bg-gray-100 text-gray-900 font-sans min-h-screen transition-colors duration-300">
    <nav class="bg-white shadow-md mb-4">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-800">Kasir App</a>
            
            <div class="flex items-center space-x-4">
                
                <div class="hidden md:flex md:space-x-4 items-center">
                    @auth
                        <a href="{{ route('sales.index') }}" class="text-gray-600 hover:text-blue-500 font-medium transition-colors duration-300">Kasir</a>
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-blue-500 font-medium transition-colors duration-300">Daftar Produk</a>
                            <a href="{{ route('sales.history') }}" class="text-gray-600 hover:text-blue-500 font-medium transition-colors duration-300">Riwayat Transaksi</a>
                            <a href="{{ route('sales.report') }}" class="text-gray-600 hover:text-blue-500 font-medium transition-colors duration-300">Laporan Penjualan</a>
                            <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-blue-500 font-medium transition-colors duration-300">Kelola Pengguna</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition-colors duration-300">Logout</button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-500 font-medium transition-colors duration-300">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-500 font-medium transition-colors duration-300">Register</a>
                    @endguest
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-700 focus:outline-none transition-colors duration-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden">
            @auth
                <a href="{{ route('sales.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition-colors duration-300">Kasir</a>
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('products.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition-colors duration-300">Daftar Produk</a>
                    <a href="{{ route('sales.history') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition-colors duration-300">Riwayat Transaksi</a>
                    <a href="{{ route('sales.report') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition-colors duration-300">Laporan Penjualan</a>
                    <a href="{{ route('users.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition-colors duration-300">Kelola Pengguna</a>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-red-500 hover:bg-gray-200 transition-colors duration-300">Logout</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition-colors duration-300">Login</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition-colors duration-300">Register</a>
            @endguest
        </div>
    </nav>

    <main class="container mx-auto px-4 py-4 md:px-0">
        @yield('content')
    </main>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        @if(session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "#4CAF50",
            }).showToast();
        @endif
        @if(session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "#F44336",
            }).showToast();
        @endif

        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>