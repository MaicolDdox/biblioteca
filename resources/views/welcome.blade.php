<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sistema de Préstamos') }}</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Tailwind Config -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="bg-gradient-to-br from-primary-50 to-accent-50 min-h-screen font-sans">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-primary-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3" data-aos="fade-right">
                    <div class="w-10 h-10 bg-accent-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-semibold text-primary-800">BiblioSystem</span>
                </div>

                <!-- Auth Navigation -->
                @if (Route::has('login'))
                    <div class="flex items-center space-x-4" data-aos="fade-left">
                        @auth
                            <a href="{{ url('/dashboard') }}" 
                               class="inline-flex items-center px-4 py-2 bg-accent-600 text-white text-sm font-medium rounded-lg hover:bg-accent-700 transition-colors duration-200">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center px-4 py-2 text-primary-700 text-sm font-medium hover:text-accent-600 transition-colors duration-200">
                                Iniciar Sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-accent-600 text-white text-sm font-medium rounded-lg hover:bg-accent-700 transition-colors duration-200">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl lg:text-6xl font-bold text-primary-900 mb-6" data-aos="fade-up">
                    Sistema de
                    <span class="text-accent-600">Préstamos</span>
                    de Libros
                </h1>
                <p class="text-xl text-primary-600 mb-8 max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    Gestiona tu biblioteca de manera eficiente. Controla préstamos, devoluciones y mantén un registro completo de todos tus libros de forma sencilla y profesional.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400">
                    @guest
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center px-8 py-3 bg-accent-600 text-white font-semibold rounded-lg hover:bg-accent-700 transform hover:scale-105 transition-all duration-200">
                            Comenzar Ahora
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center px-8 py-3 border-2 border-primary-300 text-primary-700 font-semibold rounded-lg hover:border-accent-600 hover:text-accent-600 transition-all duration-200">
                            Iniciar Sesión
                        </a>
                    @else
                        <a href="{{ url('/dashboard') }}" 
                           class="inline-flex items-center px-8 py-3 bg-accent-600 text-white font-semibold rounded-lg hover:bg-accent-700 transform hover:scale-105 transition-all duration-200">
                            Ir al Dashboard
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-accent-200 rounded-full opacity-20 animate-float"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-primary-200 rounded-full opacity-30 animate-float" style="animation-delay: 1s;"></div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-primary-900 mb-4" data-aos="fade-up">
                    Características Principales
                </h2>
                <p class="text-lg text-primary-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Todo lo que necesitas para gestionar tu biblioteca de manera profesional
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 rounded-xl bg-primary-50 hover:bg-primary-100 transition-colors duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-accent-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-900 mb-2">Gestión de Libros</h3>
                    <p class="text-primary-600">Administra tu catálogo completo con información detallada de cada libro</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-6 rounded-xl bg-primary-50 hover:bg-primary-100 transition-colors duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-accent-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-900 mb-2">Control de Usuarios</h3>
                    <p class="text-primary-600">Registra y gestiona los usuarios que solicitan préstamos</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-6 rounded-xl bg-primary-50 hover:bg-primary-100 transition-colors duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-accent-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-900 mb-2">Seguimiento de Préstamos</h3>
                    <p class="text-primary-600">Controla fechas de préstamo, devolución y estado de cada libro</p>
                </div>

                <!-- Feature 4 -->
                <div class="text-center p-6 rounded-xl bg-primary-50 hover:bg-primary-100 transition-colors duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-accent-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-900 mb-2">Reportes y Estadísticas</h3>
                    <p class="text-primary-600">Genera reportes detallados sobre el uso de tu biblioteca</p>
                </div>

                <!-- Feature 5 -->
                <div class="text-center p-6 rounded-xl bg-primary-50 hover:bg-primary-100 transition-colors duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-accent-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-900 mb-2">Recordatorios</h3>
                    <p class="text-primary-600">Sistema de notificaciones para fechas de devolución</p>
                </div>

                <!-- Feature 6 -->
                <div class="text-center p-6 rounded-xl bg-primary-50 hover:bg-primary-100 transition-colors duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-accent-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-900 mb-2">Búsqueda Avanzada</h3>
                    <p class="text-primary-600">Encuentra libros rápidamente por título, autor o categoría</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-accent-600 to-accent-700">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4" data-aos="fade-up">
                ¿Listo para comenzar?
            </h2>
            <p class="text-xl text-accent-100 mb-8" data-aos="fade-up" data-aos-delay="200">
                Únete a nosotros y transforma la gestión de tu biblioteca
            </p>
            @guest
                <a href="{{ route('register') }}" 
                   class="inline-flex items-center px-8 py-3 bg-white text-accent-600 font-semibold rounded-lg hover:bg-accent-50 transform hover:scale-105 transition-all duration-200" 
                   data-aos="fade-up" data-aos-delay="400">
                    Crear Cuenta Gratis
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            @else
                <a href="{{ url('/dashboard') }}" 
                   class="inline-flex items-center px-8 py-3 bg-white text-accent-600 font-semibold rounded-lg hover:bg-accent-50 transform hover:scale-105 transition-all duration-200" 
                   data-aos="fade-up" data-aos-delay="400">
                    Acceder al Dashboard
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            @endguest
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary-900 text-primary-300 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <div class="w-8 h-8 bg-accent-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-semibold text-white">BiblioSystem</span>
                </div>
                <p class="text-sm">© {{ date('Y') }} BiblioSystem. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    </script>
</body>
</html>
