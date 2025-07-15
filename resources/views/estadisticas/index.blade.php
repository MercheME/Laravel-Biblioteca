@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <h1 class="text-2xl mb-6 flex items-center space-x-3 ">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
        </svg>
        <span>Estadísticas de tu Biblioteca</span>
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 border shadow">
            <h2 class="text-lg font-sans font-bold">Total de Libros</h2>
            <p class="text-3xl">{{ $totalLibros }}</p>
        </div>

        <div class="bg-white p-4 border shadow">
            <h2 class="text-lg font-sans font-bold">Libros Leídos</h2>
            <p class="text-3xl">{{ $leidos }}</p>
        </div>

        <div class="bg-white p-4 border shadow">
            <h2 class="text-lg font-sans font-bold">Leyendo</h2>
            <p class="text-3xl">{{ $leyendo }}</p>
        </div>

        <div class="bg-white p-4 border shadow">
            <h2 class="text-lg font-sans font-bold">Pendientes</h2>
            <p class="text-3xl">{{ $pendientes }}</p>
        </div>

        <div class="bg-white p-4 border shadow col-span-1 sm:col-span-2">
            <h2 class="text-lg font-sans mb-2 font-bold">Progreso de lectura</h2>
            <div class="w-full bg-gray-200 rounded-full h-4">
                <div class="bg-green-500 h-4 rounded-full" style="width: {{ $porcentajeLeidos }}%"></div>
            </div>
            <p class="mt-2 text-sm font-mono text-gray-500">{{ $porcentajeLeidos }}% completado</p>
        </div>

        <div class="bg-white p-4 border shadow">
            <h2 class="text-lg font-sans font-bold">Promedio de Puntuación</h2>
            <p class="text-3xl">{{ number_format($promedioPuntuacion, 1) }}</p>
        </div>

        <div class="bg-white p-4 border shadow">
            <h2 class="text-lg font-sans font-bold">Libros Favoritos</h2>
            <p class="text-3xl">{{ $favoritos }}</p>
        </div>

        <div class="bg-white p-4 border font-sans shadow sm:col-span-2">
            <h2 class="text-lg font-bold mb-2">Libros Prestados</h2>
            @forelse ($prestados as $libro)
                <p>{{ $libro->titulo }} → {{ $libro->prestado_a }} ({{ $libro->fecha_prestamo }})</p>
            @empty
                <p class="text-sm text-gray-500">No hay libros prestados.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white p-4 border shadow mt-8">
        <h2 class="text-lg font-sans font-bold mb-4">Gráfico por Género</h2>
        <canvas id="generosChart" height="100"></canvas>
    </div>

    @push('scripts')
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('generosChart').getContext('2d');

            const labels = {!! json_encode($generos->pluck('genero')) !!};
            const data = {!! json_encode($generos->pluck('total')) !!};

            const backgroundColors = [
                'rgba(255, 99, 132, 0.5)',  // rojo
                'rgba(54, 162, 235, 0.5)',  // azul
                'rgba(255, 206, 86, 0.5)',  // amarillo
                'rgba(75, 192, 192, 0.5)',  // verde
                'rgba(153, 102, 255, 0.5)', // morado
                'rgba(255, 159, 64, 0.5)',  // naranja
                'rgba(199, 199, 199, 0.5)', // gris
            ];

            const borderColors = backgroundColors.map(color =>
                color.replace('0.5', '1')
            );

            const generosChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de Libros',
                        data: data,
                        backgroundColor: backgroundColors.slice(0, data.length),
                        borderColor: borderColors.slice(0, data.length),
                        borderWidth: 1,
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        });
        </script>
    @endpush
</div>
@endsection
