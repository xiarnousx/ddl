<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/process', [UploadController::class, 'process'])->name('process');
Route::get('list', [UploadController::class, 'list'])->name('list');
