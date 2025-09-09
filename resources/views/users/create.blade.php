@extends('app')

@section('title', 'Tambah Pengguna Baru')

@section('content')
<div class="space-y-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900">
            <i class="fas fa-user-plus text-blue-500 mr-3"></i>
            Tambah Pengguna Baru
        </h1>
        <a href="{{ route('users.index') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar Pengguna
        </a>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-xl">
        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Nama</label>
                    <input type="text" name="name" id="name" 
                           class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Email</label>
                    <input type="email" name="email" id="email" 
                           class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Password</label>
                    <input type="password" name="password" id="password" 
                           class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 @error('password') border-red-500 @enderror" required>
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                           class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" required>
                </div>
                
                <div class="col-span-full">
                    <label for="role" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Role</label>
                    <div class="relative">
                        <select name="role" id="role" 
                                class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 @error('role') border-red-500 @enderror" required>
                            <option value="kasir">Kasir</option>
                            <option value="admin">Admin</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    @error('role')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="pt-4 flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:bg-green-700 transition-all duration-300 transform hover:scale-105 inline-flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Pengguna
                </button>
            </div>
        </form>
    </div>
</div>
@endsection