<?php

use App\Http\Controllers\GeminiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/execute-gemi', [GeminiController::class, 'callGemi']);
Route::get('/conversation/{id}/messages', [GeminiController::class, 'getConversationMessages']);
