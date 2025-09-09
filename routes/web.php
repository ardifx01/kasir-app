<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::get('/kasir/report', [SaleController::class, 'report'])->name('sales.report');
    Route::get('/kasir/history', [SaleController::class, 'history'])->name('sales.history');
    Route::get('/kasir/report/export', function (\Illuminate\Http\Request $request) {
        return Excel::download(new SalesExport($request->start_date, $request->end_date), 'laporan-penjualan.xlsx');
    })->name('sales.export');
    
    Route::resource('users', UserController::class);
    // Hapus baris 'Route::resource('payment_methods', ...)' di sini
});

Route::middleware(['auth'])->group(function () {
    Route::controller(SaleController::class)->group(function () {
        Route::get('/kasir', 'index')->name('sales.index');
        Route::get('/kasir/search', 'search')->name('sales.search');
        Route::post('/kasir/checkout', 'store')->name('sales.store');
        Route::get('/kasir/receipt/{sale}', 'receipt')->name('sales.receipt');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');