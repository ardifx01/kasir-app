@extends('app')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="space-y-8">

    <div class="flex items-center justify-between">
        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900">
            <i class="fas fa-chart-line text-teal-500 mr-3"></i>
            Laporan Penjualan
        </h1>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-xl">
        <form action="{{ route('sales.report') }}" method="GET" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
            <div class="w-full md:w-auto flex-1">
                <label for="start_date" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Awal</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-calendar-alt text-gray-400"></i>
                    </div>
                    <input type="date" name="start_date" id="start_date" value="{{ $start_date ?? '' }}" class="w-full pl-10 pr-3 py-2 rounded-xl border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                </div>
            </div>
            <div class="w-full md:w-auto flex-1">
                <label for="end_date" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Akhir</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-calendar-alt text-gray-400"></i>
                    </div>
                    <input type="date" name="end_date" id="end_date" value="{{ $end_date ?? '' }}" class="w-full pl-10 pr-3 py-2 rounded-xl border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                </div>
            </div>
            <button type="submit" class="w-full md:w-auto mt-6 md:mt-0 bg-blue-600 text-white px-6 py-3 rounded-xl font-bold shadow-md hover:bg-blue-700 transition-colors duration-300 transform hover:scale-105">
                <i class="fas fa-filter mr-2"></i>
                Filter
            </button>
            <a href="{{ route('sales.export', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="w-full md:w-auto mt-6 md:mt-0 bg-green-600 text-white px-6 py-3 rounded-xl font-bold shadow-md hover:bg-green-700 transition-colors duration-300 transform hover:scale-105">
                <i class="fas fa-file-excel mr-2"></i>
                Unduh Excel
            </a>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-xl flex items-center space-x-4 transition-transform duration-300 hover:scale-105">
            <div class="flex-shrink-0 p-4 rounded-full bg-green-100 text-green-600">
                <i class="fas fa-dollar-sign text-2xl"></i>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase">Total Pendapatan</h2>
                <p class="text-3xl font-extrabold text-gray-900 mt-1">Rp. {{ number_format($total_sales) }}</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-xl flex items-center space-x-4 transition-transform duration-300 hover:scale-105">
            <div class="flex-shrink-0 p-4 rounded-full bg-blue-100 text-blue-600">
                <i class="fas fa-receipt text-2xl"></i>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase">Total Transaksi</h2>
                <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ number_format($total_transactions) }}</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-xl flex items-center space-x-4 transition-transform duration-300 hover:scale-105">
            <div class="flex-shrink-0 p-4 rounded-full bg-yellow-100 text-yellow-600">
                <i class="fas fa-box-open text-2xl"></i>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase">Produk Terjual</h2>
                <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ number_format($top_products->sum('total_quantity')) }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-xl">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Grafik Penjualan Harian</h2>
            <div class="relative h-72"> 
                <canvas id="dailySalesChart"></canvas>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-xl">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">5 Produk Terlaris</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Produk</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jumlah Terjual</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($top_products as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-bold">{{ $item->total_quantity }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-4 text-center text-gray-500">Belum ada produk yang terjual.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('dailySalesChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chart_labels),
                datasets: [{
                    label: 'Total Penjualan (Rp)',
                    data: @json($chart_data),
                    backgroundColor: 'rgba(59, 130, 246, 0.7)', // blue-500 with opacity
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1,
                    borderRadius: 5,
                    hoverBackgroundColor: 'rgba(37, 99, 235, 0.9)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Penting: Ini memungkinkan grafik untuk menyesuaikan tinggi container
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(209, 213, 219, 0.5)' // gray-300 with opacity
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                family: 'Poppins'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#1f2937', // gray-800
                        bodyColor: '#4b5563', // gray-600
                        borderColor: '#e5e7eb', // gray-200
                        borderWidth: 1,
                        displayColors: false,
                        titleFont: {
                            family: 'Poppins',
                            weight: 'bold'
                        },
                        bodyFont: {
                            family: 'Poppins'
                        },
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += 'Rp. ' + context.parsed.y.toLocaleString('id-ID');
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection