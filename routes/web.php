<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Ruta para la landing page
Route::get('/', function () {
    return view('landing');
})->name('home');

// Rutas CRUD para los productos
Route::resource('products', ProductController::class);