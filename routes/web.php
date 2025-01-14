<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FfmpegController;

Route::get('/', function () {
    return view('welcome');
});


//Route::post('/convert', [FfmpegController::class, 'convert']);