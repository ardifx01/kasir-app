@extends('app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="card-header font-bold text-gray-700">Dashboard</div>

                <div class="card-body mt-4">
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Anda berhasil login!
                    <br>
                    <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Kelola Produk</a> atau <a href="{{ route('sales.index') }}" class="text-blue-500 hover:underline">Buka Kasir</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection