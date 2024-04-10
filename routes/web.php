<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ReviewController;

// Ruta para la landing page
Route::get('/', function () {
    return view('landing');
})->name('home');

// Rutas CRUD para los productos
Route::resource('products', ProductController::class);

// Rutas para Categorías
Route::resource('categories', CategoryController::class);

// Rutas para Etiquetas
Route::resource('tags', TagController::class);

// Rutas para Reseñas
Route::resource('reviews', ReviewController::class);