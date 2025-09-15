@extends('dashboard')

@section('title', 'Catálogo de Libros')

@section('content')
    <div class="p-6 space-y-6" data-aos="fade-up">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-primary-800">Catálogo de Libros</h1>
                <p class="text-primary-600 mt-1">Explora nuestra colección y solicita préstamos</p>
            </div>
        </div>

        <!-- Books Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($books as $book)
                <div class="card group hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1"
                    data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <!-- Book Icon -->
                    <div class="relative mb-4">
                        <div
                            class="aspect-[3/4] bg-gradient-to-br from-primary-100 to-primary-200 rounded-lg flex items-center justify-center overflow-hidden">
                            <svg class="w-16 h-16 text-primary-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>

                        <!-- Availability Badge -->
                        <div class="absolute top-2 right-2">
                            @if ($book->estado === 'disponible')
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-1"></div>
                                    Disponible
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <div class="w-2 h-2 bg-red-400 rounded-full mr-1"></div>
                                    Prestado
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Book Info -->
                    <div class="space-y-3">
                        <div>
                            <h3
                                class="font-semibold text-primary-800 text-lg leading-tight group-hover:text-accent-600 transition-colors duration-200">
                                {{ $book->titulo }}
                            </h3>
                            <p class="text-primary-600 text-sm mt-1">{{ $book->autor }}</p>
                        </div>

                        <div class="flex items-center justify-between text-sm text-primary-500">
                            <span>{{ \Carbon\Carbon::parse($book->year_publicacion)->format('Y') }}</span>
                            <span class="capitalize">{{ $book->estado }}</span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-2 pt-2">

                            <!-- Loan Button -->
                            @if ($book->estado === 'disponible')
                                <a href="{{ route('loan.create', ['book_id' => $book->id]) }}"
                                    class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-accent-600 rounded-lg hover:bg-accent-700 transform hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Prestar
                                </a>
                            @else
                                <button disabled
                                    class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-primary-400 bg-primary-100 rounded-lg cursor-not-allowed">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728">
                                        </path>
                                    </svg>
                                    No disponible
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-full flex flex-col items-center justify-center py-16" data-aos="fade-up">
                    <div class="w-24 h-24 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-800 mb-2">No hay libros disponibles</h3>
                    <p class="text-primary-600 text-center max-w-md">
                        Actualmente no hay libros en el catálogo. Los administradores pueden agregar libros desde el panel
                        de administración.
                    </p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- AOS Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 600,
                easing: 'ease-in-out',
                once: true,
                offset: 50
            });
        });
    </script>
@endsection
