@extends('app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="space-y-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900">
            <i class="fas fa-user-edit text-purple-500 mr-3"></i>
            Edit Pengguna
        </h1>
        <a href="{{ route('users.index') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar Pengguna
        </a>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-xl">
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                           class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                           class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Password Baru <span class="text-gray-400 font-normal">(kosongkan jika tidak diubah)</span></label>
                    <input type="password" name="password" id="password" 
                           class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                           class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                </div>
                
                <div class="col-span-full">
                    <label for="role" class="block text-sm font-semibold text-gray-700 uppercase mb-2">Role</label>
                    <div class="relative">
                        <select name="role" id="role" 
                                class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 @error('role') border-red-500 @enderror" required>
                            <option value="kasir" {{ $user->role === 'kasir' ? 'selected' : '' }}>Kasir</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
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
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 inline-flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    Perbarui Pengguna
                </button>
            </div>
        </form>
    </div>
</div>
@endsection