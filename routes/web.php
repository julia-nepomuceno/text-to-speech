<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextToSpeechController;

//formulario
Route::get('/', [TextToSpeechController::class, 'index']);
//enviar o texto
Route::post('/speak', [TextToSpeechController::class, 'speak'])->name('speak');
