<?php

use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Nav;
use App\Livewire\Register;
use App\Livewire\Todo;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/todo', Todo::class)->name('todo');
    Route::post('/todo', Todo::class);
    Route::post('/logout', Nav::class)->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::post('/login', Login::class);
    Route::get('/register', Register::class)->name('register');
    Route::post('/register', Register::class);
});

Route::get('/', Home::class)->name('home');
