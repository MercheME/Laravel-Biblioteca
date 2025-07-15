<?php

use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros/store', [LibroController::class, 'store'])->name('libros.store');

Route::get('/libros/{id}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{id}', [LibroController::class, 'update'])->name('libros.update');

Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');

Route::get('libros/{id}', [LibroController::class, 'show'])->name('libros.show');

Route::patch('/libros/{id}/favorito', [LibroController::class, 'toggleFavorito'])->name('libros.favorito');

Route::get('/favoritos', [LibroController::class, 'favoritos'])->name('libros.favoritos');

Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index');

