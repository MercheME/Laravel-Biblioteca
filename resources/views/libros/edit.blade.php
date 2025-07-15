@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-2xl mb-6 text-gray-800">Editar Libro</h1>

    <form action="{{ route('libros.update', $libro->id) }}" method="POST" class="space-y-6 bg-white p-6 border shadow font-sans">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="titulo" id="titulo" required value="{{ old('titulo', $libro->titulo) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
        </div>

        <div>
            <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
            <input type="text" name="autor" id="autor" required value="{{ old('autor', $libro->autor) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
        </div>

        <div>
            <label for="portada" class="block text-sm font-medium text-gray-700">URL de la Portada</label>
            @if($libro->portada)
                <img src="{{ $libro->portada }}" alt="Portada Actual" class="mb-2 max-w-xs rounded-md shadow">
            @endif
            <input type="url" name="portada" id="portada" value="{{ old('portada', $libro->portada) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
        </div>

        <div>
            <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
            <input type="text" name="genero" id="genero" required value="{{ old('genero', $libro->genero) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
        </div>

        <div>
            <label for="año_publicacion" class="block text-sm font-medium text-gray-700">Año de Publicación</label>
            <input type="number" name="año_publicacion" id="año_publicacion" required value="{{ old('año_publicacion', $libro->año_publicacion) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
        </div>

        <div>
            <label for="formato" class="block text-sm font-medium text-gray-700">Formato</label>
            <select name="formato" id="formato" required
                class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300">
                <option value="físico" {{ old('formato', $libro->formato) == 'físico' ? 'selected' : '' }}>Físico</option>
                <option value="ebook" {{ old('formato', $libro->formato) == 'ebook' ? 'selected' : '' }}>eBook</option>
                <option value="pdf" {{ old('formato', $libro->formato) == 'pdf' ? 'selected' : '' }}>PDF</option>
            </select>
        </div>

        <div>
            <label for="estado_lectura" class="block text-sm font-medium text-gray-700">Estado de Lectura</label>
            <select name="estado_lectura" id="estado_lectura" required
                class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-orange-300">
                <option value="pendiente" {{ old('estado_lectura', $libro->estado_lectura) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="leyendo" {{ old('estado_lectura', $libro->estado_lectura) == 'leyendo' ? 'selected' : '' }}>Leyendo</option>
                <option value="leído" {{ old('estado_lectura', $libro->estado_lectura) == 'leído' ? 'selected' : '' }}>Leído</option>
            </select>
        </div>

        <div>
            <label for="puntuacion" class="block text-sm font-medium text-gray-700">Puntuación (1-10)</label>
            <input type="number" name="puntuacion" id="puntuacion" min="1" max="10" required value="{{ old('puntuacion', $libro->puntuacion) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
        </div>

        <div>
            <label for="opinion" class="block text-sm font-medium text-gray-700">Opinión Personal</label>
            <textarea name="opinion" id="opinion" rows="4"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">{{ old('opinion', $libro->opinion) }}</textarea>
        </div>

        <div>
            <label for="prestado_a" class="block text-sm font-medium text-gray-700">Prestado a</label>
            <input type="text" name="prestado_a" id="prestado_a" value="{{ old('prestado_a', $libro->prestado_a) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
        </div>

        <div>
            <label for="fecha_prestamo" class="block text-sm font-medium text-gray-700">Fecha de Préstamo</label>
            <input type="date" name="fecha_prestamo" id="fecha_prestamo" value="{{ old('fecha_prestamo', $libro->fecha_prestamo) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
        </div>

        <div>
            <button type="submit"
                class="w-full bg-orange-500 font-bold text-white py-2 px-4 rounded-md hover:bg-orange-700 transition">Actualizar Libro</button>
        </div>
    </form>
</div>
@endsection
