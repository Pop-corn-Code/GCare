<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\Dash\Index;
use App\Livewire\Landing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('landing', Landing::class)->name('app.landing');
Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'loginForm')->name('app.login-form');
    Route::get('register', 'registerForm')->name('app.register-form');
    Route::post('login', 'authenticate')->name('app.login');
    Route::post('register', 'register')->name('app.register');
  
});

Route::controller(GoogleController::class)->group(function(){
  //google authentication
  Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
  Route::get('callback', 'handleGoogleCallback')->name('auth.handle-google-callback');
});

/**
 * Dashboard route
 */
Route::get('dash', Index::class)->name('app.dashboard');