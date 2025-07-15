@props(['libro'])

<div class="bg-white border overflow-hidden p-4 flex flex-col items-center transition hover:shadow-lg">
    <form action="{{ route('libros.favorito', $libro->id) }}" method="POST" class="inline self-end mb-2 mx-4">
        @csrf
        @method('PATCH')
        <button type="submit" title="Marcar como favorito">
            @if ($libro->favorito)
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-steal-500" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2
                    5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5
                    2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22
                    5.42 22 8.5c0 3.78-3.4 6.86-8.55
                    11.54L12 21.35z"/>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400 hover:text-steal-500 transition" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 21.35l-1.45-1.32C5.4
                        15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5
                        3c1.74 0 3.41 0.81 4.5
                        2.09C13.09 3.81 14.76 3 16.5 3 19.58 3
                        22 5.42 22 8.5c0 3.78-3.4 6.86-8.55
                        11.54L12 21.35z"/>
                </svg>
            @endif
        </button>
        </form>

            <img src="{{ $libro->portada }}" alt="{{ $libro->titulo }}" class="w-50 h-auto object-cover rounded-md mb-4 shadow">

            <h3 class="text-lg font-semibold text-center text-gray-800 mb-1">{{ $libro->titulo }}</h3>

            <p class="text-sm text-gray-500 mb-3 text-center">de {{ $libro->autor }}</p>

            <span class="text-sm border border-gray-400 px-2 py-1 rounded-full text-gray-600 mb-2">{{ $libro->genero }}</span>

            <div class="flex justify-center gap-4 mt-3">
                <a href="{{ route('libros.show', $libro->id) }}" class="flex flex-col items-center text-steal-600 hover:text-steal-800 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mb-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2C6 2 2.73 4.11 1 7.5c1.73 3.39 5 5.5 9 5.5s7.27-2.11 9-5.5C17.27 4.11 14 2 10 2zm0 9a3 3 0 110-6 3 3 0 010 6z" />
                    </svg>
                    Ver
                </a>

                <a href="{{ route('libros.edit', $libro->id) }}" class="flex flex-col items-center text-orange-400 hover:text-orange-600 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mb-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 15a1 1 0 011-1h11a1 1 0 100-2H4a3 3 0 00-3 3v1a1 1 0 102 0v-1z" clip-rule="evenodd" />
                    </svg>
                    Editar
                </a>

                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="flex flex-col items-center text-red-500 hover:text-red-600 text-sm">
                @csrf
                @method('DELETE')
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mb-1 mx-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 3a1 1 0 011-1h6a1 1 0 011 1v1h4a1 1 0 110 2h-1v11a2 2 0 01-2 2H5a2 2 0 01-2-2V6H2a1 1 0 110-2h4V3zm2 4a1 1 0 10-2 0v8a1 1 0 102 0V7zm4 0a1 1 0 10-2 0v8a1 1 0 102 0V7z" clip-rule="evenodd" />
                        </svg>
                        Eliminar
                    </button>
                </form>
            </div>
</div>
