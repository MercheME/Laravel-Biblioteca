<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
       public function index()
    {
        $totalLibros = Libro::count();
        $leidos = Libro::where('estado_lectura', 'leído')->count();
        $leyendo = Libro::where('estado_lectura', 'leyendo')->count();
        $pendientes = Libro::where('estado_lectura', 'pendiente')->count();

        $porcentajeLeidos = $totalLibros > 0 ? round(($leidos / $totalLibros) * 100, 1) : 0;

        $generos = Libro::select('genero', DB::raw('count(*) as total'))
                        ->groupBy('genero')
                        ->get();

        $promedioPuntuacion = Libro::whereNotNull('puntuacion')->avg('puntuacion');

        $favoritos = Libro::where('favorito', true)->count();

        $prestados = Libro::whereNotNull('prestado_a')
            ->where('prestado_a', '!=', 'Nadie')
            ->get();

        return view('estadisticas.index', compact(
            'totalLibros', 'leidos', 'leyendo', 'pendientes',
            'porcentajeLeidos', 'generos', 'promedioPuntuacion',
            'favoritos', 'prestados'
        ));
    }
}
