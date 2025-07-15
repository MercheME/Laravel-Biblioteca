@extends('layouts.app')

@section('title', 'Listado de Libros')

@section('content')
   <div class="min-h-screen max-w-6xl mx-auto px-4 py-8">
        <form method="GET" action="{{ route('libros.index') }}" class="grid md:grid-cols-5 font-sans gap-4 mb-8">
            <input type="text" name="titulo" placeholder="Buscar por título" value="{{ request('titulo') }}"
                class="border rounded-lg px-3 py-2 w-full bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <input type="text" name="autor" placeholder="Buscar por autor" value="{{ request('autor') }}"
                class="border rounded-lg px-3 py-2 w-full bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <input type="text" name="genero" placeholder="Buscar por género" value="{{ request('genero') }}"
                class="border rounded-lg px-3 py-2 w-full bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <select name="estado_lectura"
                class="border rounded-lg px-3 py-2 w-full bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Todos</option>
                <option value="pendiente" {{ request('estado_lectura') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="leyendo" {{ request('estado_lectura') == 'leyendo' ? 'selected' : '' }}>Leyendo</option>
                <option value="leído" {{ request('estado_lectura') == 'leído' ? 'selected' : '' }}>Leído</option>
            </select>

            <button type="submit"
                class="bg-teal-600 hover:bg-teal-800 text-white px-4 py-2 rounded-lg transition-all flex items-center font-bold justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                        clip-rule="evenodd" />
                </svg>
                <span>Buscar</span>
            </button>

        </form>

        @if (request()->routeIs('libros.favoritos'))
            <h2 class="text-xl text-steal-500 mb-4">Libros Favoritos</h2>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 py-6 font-sans">
            @foreach ($libros as $libro)
                <x-libro-card :libro="$libro" />
            @endforeach
        </div>
        <div class="mt-6">
            {{ $libros->appends(request()->query())->links() }}
        </div>
    </div>

@endsection
