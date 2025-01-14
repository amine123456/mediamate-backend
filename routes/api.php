<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FfmpegController;

Route::post('/convert', [FfmpegController::class, 'convert']);