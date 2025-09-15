@extends('dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800 mb-2">Confirmar Préstamo</h1>
                    <p class="text-slate-600">Complete la información para registrar el préstamo del libro</p>
                </div>
                <a href="{{ route('books.catalogo') }}" 
                   class="inline-flex items-center px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Volver al Catálogo
                </a>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-white">Información del Préstamo</h2>
                        <p class="text-blue-100 text-sm">Verifique los datos antes de confirmar</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <form style="color: black" action="{{ route('loan.store') }}" method="POST" class="p-8">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="hidden" name="student_id" value="{{ $student->id }}">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Book Information -->
                    <div class="space-y-6">
                        <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                            <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Información del Libro
                            </h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Título</label>
                                    <input type="text" 
                                           value="{{ $book->titulo }}" 
                                           disabled 
                                           class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-800 font-medium focus:outline-none">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Autor</label>
                                    <input type="text" 
                                           value="{{ $book->autor }}" 
                                           disabled 
                                           class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-600 focus:outline-none">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Año de Publicación</label>
                                    <input type="text" 
                                           value="{{ \Carbon\Carbon::parse($book->year_publicacion)->format('Y') }}" 
                                           disabled 
                                           class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-600 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student and Loan Information -->
                    <div class="space-y-6">
                        <div class="bg-green-50 rounded-xl p-6 border border-green-200">
                            <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Información del Estudiante
                            </h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Estudiante</label>
                                    <input type="text" 
                                           value="{{ $student->user->name }}" 
                                           disabled 
                                           class="w-full px-4 py-3 bg-white border border-green-300 rounded-lg text-slate-800 font-medium focus:outline-none">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                                    <input type="text" 
                                           value="{{ $student->user->email }}" 
                                           disabled 
                                           class="w-full px-4 py-3 bg-white border border-green-300 rounded-lg text-slate-600 focus:outline-none">
                                </div>
                            </div>
                        </div>

                        <!-- Loan Details -->
                        <div class="bg-amber-50 rounded-xl p-6 border border-amber-200">
                            <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a2 2 0 100-4 2 2 0 000 4zm6-6V7a4 4 0 10-8 0v4h8z"/>
                                </svg>
                                Detalles del Préstamo
                            </h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="fecha_devolucion" class="block text-sm font-medium text-slate-700 mb-2">
                                        Fecha de Devolución *
                                    </label>
                                    <input type="date" 
                                           name="fecha_devolucion" 
                                           id="fecha_devolucion"
                                           required 
                                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                           class="w-full px-4 py-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('fecha_devolucion') border-red-500 @enderror">
                                    @error('fecha_devolucion')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <div>
                                            <h4 class="text-sm font-medium text-blue-800">Información Importante</h4>
                                            <p class="text-sm text-blue-700 mt-1">El préstamo se registrará con fecha de hoy. Asegúrese de que la fecha de devolución sea correcta.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end mt-8 pt-6 border-t border-slate-200">
                    <a href="{{ route('books.catalogo') }}" 
                       class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 text-slate-700 font-medium rounded-lg hover:bg-slate-50 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Cancelar
                    </a>
                    
                    <button type="submit" 
                            class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Confirmar Préstamo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
