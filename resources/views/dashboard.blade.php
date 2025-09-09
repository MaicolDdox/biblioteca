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

<body class="bg-primary-50 font-sans">
    <div class="flex h-screen overflow-hidden">

        <!-- Reorganized sidebar with proper spacing and icon sizes -->
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg border-r border-primary-200 transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 -translate-x-full lg:translate-x-0"
            id="sidebar">

            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-4 border-b border-primary-200">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-accent-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="text-lg font-semibold text-primary-800">BiblioSystem</span>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 px-4 py-6 overflow-y-auto">

                <!-- Main Menu Items -->
                <div class="space-y-1">

                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-accent-100 text-accent-700 border-r-4 border-accent-600' : 'text-primary-600 hover:bg-primary-100 hover:text-accent-600' }}">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ request()->routeIs('dashboard') ? 'text-accent-600' : 'text-primary-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z" />
                        </svg>
                        Dashboard
                    </a>

                    <!-- Libros -->
                    <a href=""
                        class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('books.*') ? 'bg-accent-100 text-accent-700 border-r-4 border-accent-600' : 'text-primary-600 hover:bg-primary-100 hover:text-accent-600' }}">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ request()->routeIs('books.*') ? 'text-accent-600' : 'text-primary-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Libros
                    </a>

                    <!-- Historial de Préstamos -->
                    <a href=""
                        class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('loans.*') ? 'bg-accent-100 text-accent-700 border-r-4 border-accent-600' : 'text-primary-600 hover:bg-primary-100 hover:text-accent-600' }}">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ request()->routeIs('loans.*') ? 'text-accent-600' : 'text-primary-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Historial de Préstamos
                    </a>
                </div>

                <div class="my-6 border-t border-primary-200"></div>

                <div class="space-y-1">
                    <div class="px-3 mb-2">
                        <h3 class="text-xs font-semibold text-primary-400 uppercase tracking-wider">Administración</h3>
                    </div>

                    <a href=""
                        class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 text-primary-600 hover:bg-primary-100 hover:text-accent-600">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 text-primary-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                        Usuarios
                    </a>

                    <a href=""
                        class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 text-primary-600 hover:bg-primary-100 hover:text-accent-600">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 text-primary-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Reportes
                    </a>
                </div>

                <!-- Divider -->
                <div class="my-6 border-t border-primary-200"></div>

                <!-- Account Section -->
                <div class="space-y-1">
                    <div class="px-3 mb-2">
                        <h3 class="text-xs font-semibold text-primary-400 uppercase tracking-wider">Cuenta</h3>
                    </div>

                    <!-- Perfil -->
                    <a href=""
                        class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('profile.*') ? 'bg-accent-100 text-accent-700 border-r-4 border-accent-600' : 'text-primary-600 hover:bg-primary-100 hover:text-accent-600' }}">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ request()->routeIs('profile.*') ? 'text-accent-600' : 'text-primary-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Mi Perfil
                    </a>

                    <!-- Logout button -->
                    <form method="POST" action="{{ route('logout') }}" class="inline ">
                        @csrf
                        <button type="submit"
                            class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 text-primary-600 hover:bg-primary-100 hover:text-accent-600">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Improved main content area with better header layout -->
        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Header -->
            <header class="bg-white border-b border-primary-200 shadow-sm sticky top-0 z-30">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">

                        <!-- Left side: Mobile toggle + Page title -->
                        <div class="flex items-center space-x-4">
                            <!-- Mobile menu button -->
                            <button
                                class="lg:hidden p-2 rounded-lg text-primary-600 hover:bg-primary-100 transition-colors duration-200"
                                id="sidebar-toggle">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>

                            <!-- Page title -->
                            <div>
                                <h1 class="text-xl font-bold text-primary-800">
                                    @yield('page-title', 'BiblioSystem')
                                </h1>
                                <p class="text-sm text-primary-500 hidden sm:block">
                                    @yield('page-subtitle', 'Sistema de Gestión de Biblioteca')
                                </p>
                            </div>
                        </div>

                        <!-- Right side: User info + Logout -->
                        <div class="flex items-center space-x-4">

                            @auth
                                <!-- User info (desktop only) -->
                                <div class="hidden md:flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-primary-200 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="text-sm">
                                        <p class="font-medium text-primary-800">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-primary-50 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile overlay -->
    <div class="fixed inset-0 z-40 bg-primary-900 bg-opacity-50 transition-opacity lg:hidden hidden"
        id="sidebar-overlay"></div>

    <!-- Scripts -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true
        });

        // Mobile sidebar functionality
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        sidebarToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>

</html>
