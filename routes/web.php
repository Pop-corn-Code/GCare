<?php

use App\Http\Controllers\Auth\AuthController;
use App\Livewire\Landing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('landing', Landing::class);
Route::controller(AuthController::class)->group(function(){
    Route::get('login', ' loginForm')->name('app.login-form');
    Route::get('register', ' registerForm')->name('app.register-form');
});