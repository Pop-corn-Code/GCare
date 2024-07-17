<?php

use App\Livewire\Landing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('landing', Landing::class);