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
