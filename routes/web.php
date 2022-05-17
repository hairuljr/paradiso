<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('permission:view dashboard');

Route::group(['middleware' => ['permission:view bahan-baku']], function () {
    Route::get('/bahanbaku', \App\Http\Livewire\Bahanbaku\Index::class)->middleware('auth')->name('bahanbaku.index');
    Route::get('/bahanbaku/create', \App\Http\Livewire\Bahanbaku\Create::class)->middleware('auth')->name('bahanbaku.create');
});

Route::group(['middleware' => ['permission:view jenis-produk']], function () {
    Route::get('/jenisproduk', \App\Http\Livewire\Jenisproduk\Index::class)->middleware('auth')->name('jenisproduk.index');
    Route::get('/jenisproduk/create', \App\Http\Livewire\Jenisproduk\Create::class)->middleware('auth')->name('jenisproduk.create');
});

Route::group(['middleware' => ['permission:view produk']], function () {
    Route::get('/produk', \App\Http\Livewire\Produk\Index::class)->middleware('auth')->name('produk.index');
    Route::get('/produk/create', \App\Http\Livewire\Produk\Create::class)->middleware('auth')->name('produk.create');
});

Route::group(['middleware' => ['permission:view bahan-baku-masuk']], function () {
    Route::get('/bahanbakumasuk', \App\Http\Livewire\Bahanbakumasuk\Index::class)->middleware('auth')->name('bahanbakumasuk.index');
    Route::get('/bahanbakumasuk/create', \App\Http\Livewire\Bahanbakumasuk\Create::class)->middleware('auth')->name('bahanbakumasuk.create');
});

Route::group(['middleware' => ['permission:view cgs']], function () {
    Route::get('/cost', \App\Http\Livewire\Cost\Index::class)->middleware('auth')->name('cost.index');
    Route::get('/cost/create', \App\Http\Livewire\Cost\Create::class)->middleware('auth')->name('cost.create');
});

Route::group(['middleware' => ['permission:view penjualan']], function () {
    Route::get('/penjualan', \App\Http\Livewire\Penjualan\Index::class)->middleware('auth')->name('penjualan.index');
    Route::get('/penjualan/create', \App\Http\Livewire\Penjualan\Create::class)->middleware('auth')->name('penjualan.create');
});

Route::group(['middleware' => ['permission:view bahan-baku-keluar']], function () {
    Route::get('/bahanbakukeluar', \App\Http\Livewire\Bahanbakukeluar\Index::class)->middleware('auth')->name('bahanbakukeluar.index');
});

Route::get('/laporanbahanbakumasuk', \App\Http\Livewire\Laporanbahanbakumasuk\Index::class)->middleware(['auth', 'view laporan-bahan-baku-masuk'])->name('Laporanbahanbakumasuk.index');
Route::get('/laporanpenjualan', \App\Http\Livewire\Laporanpenjualan\Index::class)->middleware(['auth', 'view laporan-penjualan'])->name('laporanpenjualan.index');
Route::get('/laporanbahanbakukeluar', \App\Http\Livewire\Laporanbahanbakukeluar\Index::class)->middleware(['auth', 'view laporan-bahan-baku-keluar'])->name('Laporanbahanbakukeluar.index');





// AJAX
// Route::post('temp', [\App\Http\Controllers\AJAXController::class, 'storeTemp'])->name('storeTemp');
