<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/admin', [ContactController::class, 'admin']);
Route::post('/choose',[ContactController::class, 'choose']);
Route::delete('/admin/delete', [ContactController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/', [ContactController::class, 'index']);
});

Route::get('/admin/search', [ContactController::class, 'search']);