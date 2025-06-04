<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

Route::middleware(['auth'])->group(function () {
  Route::get('/todo', [TodoController::class, 'index'])->name('todo');
  Route::post('/todo', [TodoController::class, 'store'])->name('addTodo');
  Route::post('/todo/clear', [TodoController::class, 'clear'])->name('clearTodo');
  Route::post('/todo/{id}/check', [TodoController::class, 'check'])->name('checkTodo');
  Route::post('/todo/{id}/uncheck', [TodoController::class, 'uncheck'])->name('uncheckTodo');
  Route::delete('/todo/{id}', [TodoController::class, 'delete'])->name('deleteTodo');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login', [AuthController::class, 'authLogin'])->name('loginSubmit');
  Route::get('/register', [AuthController::class, 'register'])->name('register');
  Route::post('/register', [AuthController::class, 'authRegister'])->name('registerSubmit');
});

Route::get('/', [HomeController::class, 'index'])->name('home');