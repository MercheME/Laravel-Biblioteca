<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    /** @use HasFactory<\Database\Factories\LibroFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo', 'autor', 'portada', 'genero', 'año_publicacion',
        'formato', 'estado_lectura', 'puntuacion', 'favorito',
        'opinion', 'prestado_a', 'fecha_prestamo'
    ];
}
