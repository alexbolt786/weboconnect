<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogoutController;

Route::middleware(['auth'])->group(function(){
	Route::get('/profile', [ProfileController::class, 'show'])->name('userProfileHome');
	Route::post('/profile-edit', [ProfileController::class, 'submit']);
	Route::get('/people', [ProfileController::class, 'people']);
	Route::get('/logout', [LogoutController::class, 'logout']);
});

Route::get('/profile-edit', [ProfileController::class, 'edit']);

Route::middleware(['guest'])->group(function(){
	Route::view('/', 'welcome')->name('welcome');
	Route::get('/login', [LoginController::class, 'show'])->name('login');
	Route::post('/login', [LoginController::class, 'submit']);
	Route::get('/register', [RegisterController::class, 'show']);
	Route::post('/register', [RegisterController::class, 'submit']);
});
