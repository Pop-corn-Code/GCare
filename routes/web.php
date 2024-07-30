<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\Dash\AllergyStatus;
use App\Livewire\Dash\EnvironmentalData;
use App\Livewire\Dash\Index;
use App\Livewire\Dash\Profile;
use App\Livewire\Dash\RecentSymptom;
use App\Livewire\Dash\Recommendation;
use App\Livewire\Dash\Settings;
use App\Livewire\Dash\Symptom;
use App\Livewire\Dash\Trigger;
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
    Route::post('logout', 'logout')->name('app.logout');
});

Route::controller(GoogleController::class)->group(function(){
  //google authentication
  Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
  Route::get('callback', 'handleGoogleCallback')->name('auth.handle-google-callback');
});

/**
 * Dashboard route
 */
Route::get('dash', Index::class)->name('app.dash.dashboard');
Route::get('log-symptom', Symptom::class)->name('app.dash.log-symptom');
Route::get('allergy-status', AllergyStatus::class)->name('app.dash.allergy-status');
Route::get('recent-symptom', RecentSymptom::class)->name('app.dash.recent-symptom');  
Route::get('triggers', Trigger::class)->name('app.dash.triggers');
Route::get('recommendation', Recommendation::class)->name('app.dash.recommendation');
Route::get('environmental-data', EnvironmentalData::class)->name('app.dash.environmental-data');
Route::get('profile', Profile::class)->name('app.dash.profile');
Route::get('settings', Settings::class)->name('app.dash.settings');