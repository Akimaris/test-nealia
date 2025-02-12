<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::middleware(['auth'])->group(function () {
//    Route::get('/uop-selector', \App\Livewire\UopSelector::class);
    Route::get('/chicken', \App\Livewire\Chicken::class)->name('chicken');
    Route::get('/farm', \App\Livewire\Farm::class)->name('farm');
});

require __DIR__ . '/auth.php';
