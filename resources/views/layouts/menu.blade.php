<header class="bg-gradient-to-r from-slate-700 to-slate-500 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-9 mt-1">
                <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
            </svg>

            <h1 class="text-3xl tracking-wide">Mi Biblioteca</h1>
        </div>

        <nav class="hidden font-sans font-semibold text-lg md:flex space-x-6">
            <a href="{{ route('libros.index') }}" class="hover:text-orange-300">Inicio</a>
            <a href="{{ route('libros.create') }}" class="hover:text-orange-300">Agregar Libro</a>
            <a href="{{ route('libros.favoritos') }}" class="hover:text-orange-300">Mis Favoritos</a>
            <a href="{{ route('estadisticas.index') }}" class="hover:text-orange-300">Estadísticas</a>

        </nav>

        <div class="md:hidden flex items-center">
            <button id="menuToggle" class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobileMenu" class="md:hidden hidden px-4 pb-4 space-y-2">
        <a href="{{ route('libros.index') }}" class="block text-white hover:underline">Inicio</a>
        <a href="{{ route('libros.create') }}" class="block text-white hover:underline">Agregar Libro</a>
        <a href="#" class="block text-white hover:underline">Mis Favoritos</a>
        <a href="#" class="block text-white hover:underline">Estadísticas</a>
    </div>

</header>
