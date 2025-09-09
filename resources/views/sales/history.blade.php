@extends('app')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900">
            <i class="fas fa-history text-purple-600 mr-3"></i>
            Riwayat Transaksi
        </h1>
    </div>

    @if($sales->isEmpty())
        <div class="flex flex-col items-center justify-center p-8 bg-white rounded-2xl shadow-xl text-center">
            <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Belum ada transaksi</h2>
            <p class="text-gray-500">Riwayat transaksi Anda akan muncul di sini setelah penjualan pertama.</p>
        </div>
    @else
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-hashtag text-blue-500 mr-2"></i>No. Transaksi
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-calendar-alt text-yellow-500 mr-2"></i>Tanggal
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-money-bill-wave text-green-500 mr-2"></i>Total Harga
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-info-circle text-red-500 mr-2"></i>Detail
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($sales as $sale)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">#{{ $sale->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sale->created_at->format('d M Y, H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-extrabold">Rp. {{ number_format($sale->total_price) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    <ul class="list-none space-y-1">
                                        @foreach ($sale->items as $item)
                                            <li class="flex items-center">
                                                <i class="fas fa-check-circle text-teal-500 text-xs mr-2"></i>
                                                {{ $item->product->name }} ({{ $item->quantity }}x) - <span class="text-gray-500 font-medium">Rp. {{ number_format($item->price_per_item) }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection