<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Route::livewire('/bahanbaku', 'bahanbaku.index')->layout('layouts.main')->name('bahanbaku.index');
Route::get('/bahanbaku', \App\Http\Livewire\Bahanbaku\Index::class)->name('bahanbaku.index');
