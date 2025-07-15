@extends('layouts.app')

@section('content')
<div class="min-h-screen max-w-6xl mx-auto px-4 py-8 font-sans">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 bg-white shadow-lg border overflow-hidden">

        <div class="p-4 bg-gray-50 flex items-center justify-center">
            @if($libro->portada)
                <img src="{{ $libro->portada }}" alt="Portada de {{ $libro->titulo }}" class="w-full h-auto object-contain rounded-md shadow-md">
            @else
                <div class="text-gray-400 text-center text-sm italic">Sin portada disponible</div>
            @endif
        </div>

        <div class="md:col-span-2 p-6 space-y-4">
            <h1 class="text-3xl font-bold text-gray-800">{{ $libro->titulo }}</h1>
            <p class="text-lg text-gray-700"><span class="font-semibold">Autor:</span> {{ $libro->autor }}</p>
            <p class="text-gray-600"><span class="font-semibold">Género:</span> {{ $libro->genero }}</p>
            <p class="text-gray-600"><span class="font-semibold">Año de publicación:</span> {{ $libro->año_publicacion }}</p>
            <p class="text-gray-600"><span class="font-semibold">Formato:</span> {{ ucfirst($libro->formato) }}</p>
            <p class="text-gray-600"><span class="font-semibold">Estado de lectura:</span> {{ ucfirst($libro->estado_lectura) }}</p>
            <p class="text-gray-600"><span class="font-semibold">Puntuación:</span>
                <span class="inline-block bg-orange-400 text-white px-2 py-1 rounded-full text-sm font-medium">
                    {{ $libro->puntuacion }}/10
                </span>
            </p>

            @if($libro->favorito)
                <p class="text-pink-600 font-semibold uppercase tracking-wide">★ Favorito</p>
            @endif

            @if($libro->opinion)
                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-gray-800">Opinión personal</h2>
                    <p class="text-gray-700 mt-2 leading-relaxed border-l-4 border-orange-400 pl-4 italic">
                        {{ $libro->opinion }}
                    </p>
                </div>
            @endif

            @if($libro->prestado_a)
                <div class="mt-4 text-sm text-gray-500">
                    <span class="font-medium text-gray-700">Prestado a:</span> {{ $libro->prestado_a }}<br>
                    <span class="font-medium text-gray-700">Fecha:</span> {{ \Carbon\Carbon::parse($libro->fecha_prestamo)->format('d M Y') }}
                </div>
            @endif

            <div class="mt-8 flex gap-4">
                <a href="{{ route('libros.edit', $libro->id) }}"
                   class="inline-block bg-orange-400 text-white px-5 py-2 rounded-md hover:bg-orange-700 transition font-semibold">
                    Editar
                </a>
                <a href="{{ route('libros.index') }}"
                   class="inline-block text-gray-600 hover:underline mt-2">
                    ← Volver al listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
