<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request) {
        $query = Libro::query();

        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        if ($request->filled('autor')) {
            $query->where('autor', 'like', '%' . $request->autor . '%');
        }

        if ($request->filled('estado_lectura')) {
            $query->where('estado_lectura', $request->estado_lectura);
        }

        if ($request->filled('genero')) {
            $query->where('genero', $request->genero);
        }

        if ($request->filled('favorito')) {
            $query->where('favorito', true);
        }

        $libros = $query->paginate(8);

        return view('libros.index', compact('libros'));
    }

    public function create() {
        return view('libros.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'portada' => 'nullable|url',
            'genero' => 'required|string|max:100',
            'año_publicacion' => 'required|integer|min:1000|max:' . date('Y'),
            'formato' => 'required|string|in:físico,ebook,pdf',
            'estado_lectura' => 'required|string|in:pendiente,leyendo,leído',
            'puntuacion' => 'nullable|integer|min:1|max:10',
            'favorito' => 'boolean',
            'opinion' => 'nullable|string',
            'prestado_a' => 'nullable|string|max:255',
            'fecha_prestamo' => 'nullable|date',
        ]);

        Libro::create($validated);
        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function edit($id) {
        $libro = Libro::findOrFail($id);
        return view('libros.edit', compact('libro'));
    }

    public function update( Request $request, $id ) {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'portada' => 'nullable|url',
            'genero' => 'required|string|max:100',
            'año_publicacion' => 'required|integer|min:1000|max:' . date('Y'),
            'formato' => 'required|string|in:físico,ebook,pdf',
            'estado_lectura' => 'required|string|in:pendiente,leyendo,leído',
            'puntuacion' => 'nullable|integer|min:1|max:10',
            'favorito' => 'boolean',
            'opinion' => 'nullable|string',
            'prestado_a' => 'nullable|string|max:255',
            'fecha_prestamo' => 'nullable|date',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update($validated);
        return redirect()->route('libros.index')->with('success', 'Libro acrualizado correctamente');
    }

    public function destroy($id) {
        Libro::findOrFail($id)->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente');
    }

    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    public function toggleFavorito($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->favorito = !$libro->favorito;
        $libro->save();

        return redirect()->route('libros.index');
    }

    public function favoritos()
    {
        $libros = Libro::where('favorito', true)->paginate(8);

        return view('libros.index', compact('libros'));
    }

}
