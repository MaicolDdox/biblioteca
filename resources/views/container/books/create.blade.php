@extends('dashboard')

@section('title', 'Crear Nuevo Libro')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6" data-aos="fade-in">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8" data-aos="fade-down" data-aos-delay="100">
            <div class="flex items-center gap-4 mb-4">
                <a href="{{ route('books.index') }}" 
                   class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white shadow-sm border border-slate-200 text-slate-600 hover:text-blue-600 hover:border-blue-300 transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Crear Nuevo Libro</h1>
                    <p class="text-slate-600 mt-1">Agrega un nuevo libro al sistema de biblioteca</p>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div style="color: black" class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="p-8">
                <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Título -->
                    <div class="space-y-2">
                        <label for="titulo" class="block text-sm font-semibold text-slate-700">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Título del Libro
                            </span>
                        </label>
                        <input type="text" 
                               id="titulo" 
                               name="titulo" 
                               value="{{ old('titulo') }}"
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white @error('titulo') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                               placeholder="Ingresa el título del libro"
                               required>
                        @error('titulo')
                            <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Autor -->
                    <div class="space-y-2">
                        <label for="autor" class="block text-sm font-semibold text-slate-700">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Autor
                            </span>
                        </label>
                        <input type="text" 
                               id="autor" 
                               name="autor" 
                               value="{{ old('autor') }}"
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white @error('autor') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                               placeholder="Ingresa el nombre del autor"
                               required>
                        @error('autor')
                            <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Año de Publicación -->
                    <div class="space-y-2">
                        <label for="year_publicacion" class="block text-sm font-semibold text-slate-700">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Año de Publicación
                            </span>
                        </label>
                        <input type="date" 
                               id="year_publicacion" 
                               name="year_publicacion" 
                               value="{{ old('year_publicacion') }}"
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white @error('year_publicacion') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                               required>
                        @error('year_publicacion')
                            <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-slate-200">
                        <button type="submit" 
                                class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 transform hover:scale-[1.02] transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Crear Libro
                        </button>
                        
                        <a href="{{ route('books.index') }}" 
                           class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 border-2 border-slate-300 text-slate-700 font-semibold rounded-lg hover:border-slate-400 hover:bg-slate-50 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Información Adicional -->
        <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-sm text-blue-800">
                    <p class="font-medium mb-1">Información importante:</p>
                    <ul class="space-y-1 text-blue-700">
                        <li>• Todos los campos son obligatorios</li>
                        <li>• El estado por defecto es "Disponible"</li>
                        <li>• Puedes cambiar el estado después de crear el libro</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
</script>
@endsection
