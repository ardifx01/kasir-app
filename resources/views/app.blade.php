<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <style>
        /* CSS Tambahan untuk visual yang lebih baik */
        #sidebar {
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94), width 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        #main-content {
            transition: margin-left 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        /* Rotasi ikon hamburger saat terbuka */
        #toggle-sidebar-button.open .hamburger-icon {
            transform: rotate(90deg);
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 font-poppins min-h-screen antialiased flex">
    
    <aside id="sidebar" class="bg-white shadow-xl h-screen fixed top-0 left-0 z-50 transform -translate-x-full transition-all duration-500 ease-in-out w-64">
        <div class="p-6 flex flex-col h-full">
            
            <div class="flex justify-between items-center mb-8">
                <a href="#" class="text-3xl font-bold text-blue-700 tracking-wide flex items-center">
                    <i class="fas fa-cash-register mr-3 text-4xl text-yellow-500"></i>
                    Kasir<span class="text-gray-600">App</span>
                </a>
            </div>
            
            <nav class="flex-grow">
                <ul class="space-y-3">
                    @auth
                        <li>
                            <a href="{{ route('sales.index') }}" class="flex items-center p-4 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-calculator w-6 mr-3"></i>
                                <span>Kasir</span>
                            </a>
                        </li>
                        @if(Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('products.index') }}" class="flex items-center p-4 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-box-open w-6 mr-3"></i>
                                    <span>Daftar Produk</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sales.history') }}" class="flex items-center p-4 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-history w-6 mr-3"></i>
                                    <span>Riwayat Transaksi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sales.report') }}" class="flex items-center p-4 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-chart-line w-6 mr-3"></i>
                                    <span>Laporan Penjualan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}" class="flex items-center p-4 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-users-cog w-6 mr-3"></i>
                                    <span>Kelola Pengguna</span>
                                </a>
                            </li>
                        @endif
                    @endauth
                    @guest
                        <li>
                            <a href="{{ route('login') }}" class="flex items-center p-4 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-sign-in-alt w-6 mr-3"></i>
                                <span>Login</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="flex items-center p-4 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-user-plus w-6 mr-3"></i>
                                <span>Register</span>
                            </a>
                        </li>
                    @endguest
                </ul>
            </nav>

            @auth
            <div class="mt-auto pt-4 border-t border-gray-200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center w-full text-left p-4 rounded-xl text-red-500 hover:bg-red-50 hover:text-red-600 font-medium transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-sign-out-alt w-6 mr-3"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
            @endauth

        </div>
    </aside>

    <div id="main-content" class="flex-1 p-4 md:p-8 transition-all duration-500">
        
        <header class="bg-white shadow-md rounded-xl p-4 flex items-center mb-6">
            <button id="toggle-sidebar-button" class="text-gray-500 hover:text-gray-700 focus:outline-none transition-all duration-300 mr-4">
                <svg class="h-8 w-8 hamburger-icon transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h1 class="text-2xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
        </header>

        <main class="w-full">
            @yield('content')
        </main>

    </div>

    <div id="sidebar-backdrop" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 hidden"></div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        @if(session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #22c55e, #16a34a)",
                stopOnFocus: true,
                className: "font-poppins"
            }).showToast();
        @endif
        @if(session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ef4444, #dc2626)",
                stopOnFocus: true,
                className: "font-poppins"
            }).showToast();
        @endif

        const toggleSidebarBtn = document.getElementById('toggle-sidebar-button');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const backdrop = document.getElementById('sidebar-backdrop');
        
        function updateLayout() {
            if (sidebar.classList.contains('translate-x-0')) {
                mainContent.style.marginLeft = '16rem'; // Sesuai dengan lebar sidebar w-64
            } else {
                mainContent.style.marginLeft = '0';
            }
            
            // Tampilkan atau sembunyikan backdrop di mobile
            if (window.innerWidth < 1024) { // Mobile
                if (sidebar.classList.contains('translate-x-0')) {
                    backdrop.classList.remove('hidden');
                } else {
                    backdrop.classList.add('hidden');
                }
            } else { // Desktop
                backdrop.classList.add('hidden');
            }
        }

        toggleSidebarBtn.addEventListener('click', () => {
            const isSidebarClosed = sidebar.classList.contains('-translate-x-full');
            if (isSidebarClosed) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                toggleSidebarBtn.classList.add('open');
            } else {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
                toggleSidebarBtn.classList.remove('open');
            }
            updateLayout();
        });

        backdrop.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            toggleSidebarBtn.classList.remove('open');
            updateLayout();
        });

        // Event listener untuk menangani perubahan ukuran layar
        window.addEventListener('resize', updateLayout);
        
        // Atur status awal saat halaman dimuat
        document.addEventListener('DOMContentLoaded', updateLayout);
    </script>
</body>
</html>