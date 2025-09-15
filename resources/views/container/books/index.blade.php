@extends('dashboard')

@section('content')
<div class="p-6" data-aos="fade-up">
    <!-- Improved header section with better create button positioning -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-800 mb-2">Gestión de Libros</h1>
            <p class="text-primary-600">Administra el catálogo de libros de la biblioteca</p>
        </div>
        <div class="mt-4 sm:mt-0 flex gap-3">
            <!-- Enhanced create button with better styling and positioning -->
            <a href="{{ route('books.create') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-accent-500 to-accent-600 text-white font-semibold rounded-lg shadow-lg hover:from-accent-600 hover:to-accent-700 transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Nuevo Libro
            </a>
            <!-- Added catalog view button -->
            <a href="{{ route('books.catalogo') }}" 
               class="inline-flex items-center px-6 py-3 bg-primary-100 text-primary-700 font-semibold rounded-lg hover:bg-primary-200 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                Ver Catálogo
            </a>
        </div>
    </div>

    <!-- Replaced basic table with professional styled table -->
    <div class="card" data-aos="fade-up" data-aos-delay="200">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-primary-200">
                        <th class="text-left py-4 px-6 font-semibold text-primary-800">Título</th>
                        <th class="text-left py-4 px-6 font-semibold text-primary-800">Autor</th>
                        <th class="text-left py-4 px-6 font-semibold text-primary-800">Año de Publicación</th>
                        <th class="text-left py-4 px-6 font-semibold text-primary-800">Estado</th>
                        <th class="text-center py-4 px-6 font-semibold text-primary-800">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="border-b border-primary-100 hover:bg-primary-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <div class="font-medium text-primary-800">{{ $book->titulo }}</div>
                            </td>
                            <td class="py-4 px-6 text-primary-600">{{ $book->autor }}</td>
                            <td class="py-4 px-6 text-primary-600">{{ $book->year_publicacion }}</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $book->estado }}
                                </span>
                            </td>
                            <!-- Added actions column with show, edit, delete buttons -->
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center space-x-2">
                                    <!-- Show Button -->
                                    <a href="{{ route('books.show', $book->id) }}" 
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-accent-100 text-accent-600 hover:bg-accent-200 transition-colors duration-200"
                                       title="Ver detalles">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    
                                    <!-- Edit Button -->
                                    <a href="{{ route('books.edit', $book->id) }}" 
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-yellow-100 text-yellow-600 hover:bg-yellow-200 transition-colors duration-200"
                                       title="Editar libro">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 transition-colors duration-200"
                                                title="Eliminar libro"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este libro?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Enhanced pagination section -->
        @if($books->hasPages())
            <div class="px-6 py-4 border-t border-primary-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-primary-600">
                        Mostrando {{ $books->firstItem() }} a {{ $books->lastItem() }} de {{ $books->total() }} resultados
                    </div>
                    <div class="flex items-center space-x-2">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Added empty state for when no books exist -->
    @if($books->isEmpty())
        <div class="card text-center py-12" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-icon">
                <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-primary-800 mb-2">No hay libros registrados</h3>
            <p class="text-primary-600 mb-6">Comienza agregando el primer libro a tu biblioteca</p>
            <!-- Updated empty state button to match new styling -->
            <a href="{{ route('books.create') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-accent-500 to-accent-600 text-white font-semibold rounded-lg shadow-lg hover:from-accent-600 hover:to-accent-700 transform hover:scale-105 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Agregar Primer Libro
            </a>
        </div>
    @endif
</div>

<!-- Added AOS initialization script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true
        });
    });
</script>
@endsection
