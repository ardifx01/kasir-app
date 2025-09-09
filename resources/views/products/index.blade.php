@extends('app')

@section('title', 'Daftar Produk')

@section('content')
<div class="space-y-8">

    <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4 md:mb-0">
            <i class="fas fa-box-open text-orange-500 mr-3"></i>
            Daftar Produk
        </h1>
        <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-xl font-bold shadow-md hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 inline-flex items-center">
            <i class="fas fa-plus-circle mr-2"></i>
            Tambah Produk Baru
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-xl flex items-center shadow-sm">
            <i class="fas fa-check-circle text-2xl mr-3"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-tag text-purple-500 mr-2"></i>Nama
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-barcode text-blue-500 mr-2"></i>SKU
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-money-bill-wave text-green-500 mr-2"></i>Harga
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-warehouse text-yellow-500 mr-2"></i>Stok
                        </th>
                        <th class="relative px-6 py-4 text-center"><span class="sr-only">Aksi</span></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->sku }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Rp. {{ number_format($product->price) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold @if($product->stock < 5) text-red-500 @else text-green-600 @endif">{{ $product->stock }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center justify-center space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-900 transition-all duration-300 transform hover:scale-110">
                                    <i class="fas fa-edit text-lg"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" class="transition-all duration-300 transform hover:scale-110">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none">
                                        <i class="fas fa-trash-alt text-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada produk yang ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection