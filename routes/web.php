<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Route::livewire('/bahanbaku', 'bahanbaku.index')->layout('layouts.main')->name('bahanbaku.index');
Route::get('/bahanbaku', \App\Http\Livewire\Bahanbaku\Index::class)->middleware('auth')->name('bahanbaku.index');
Route::get('/bahanbaku/create', \App\Http\Livewire\Bahanbaku\Create::class)->middleware('auth')->name('bahanbaku.create');

Route::get('/jenisproduk', \App\Http\Livewire\Jenisproduk\Index::class)->middleware('auth')->name('jenisproduk.index');
Route::get('/jenisproduk/create', \App\Http\Livewire\Jenisproduk\Create::class)->middleware('auth')->name('jenisproduk.create');

Route::get('/produk', \App\Http\Livewire\Produk\Index::class)->middleware('auth')->name('produk.index');
Route::get('/produk/create', \App\Http\Livewire\Produk\Create::class)->middleware('auth')->name('produk.create');

Route::get('/bahanbakumasuk', \App\Http\Livewire\Bahanbakumasuk\Index::class)->middleware('auth')->name('bahanbakumasuk.index');
Route::get('/bahanbakumasuk/create', \App\Http\Livewire\Bahanbakumasuk\Create::class)->middleware('auth')->name('bahanbakumasuk.create');

Route::get('/cost', \App\Http\Livewire\Cost\Index::class)->middleware('auth')->name('cost.index');
Route::get('/cost/create', \App\Http\Livewire\Cost\Create::class)->middleware('auth')->name('cost.create');


// AJAX
Route::post('temp', [\App\Http\Controllers\AJAXController::class, 'storeTemp'])->name('storeTemp');
