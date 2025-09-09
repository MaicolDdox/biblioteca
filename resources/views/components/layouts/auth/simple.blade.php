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

    <!-- Tailwind Configuration -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-primary-50 to-accent-50 font-sans antialiased">
    <!-- Added professional background gradient and improved structure -->
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-md">
            <!-- Enhanced logo section with better spacing and styling -->
            <div class="text-center mb-8" data-aos="fade-down" data-aos-duration="600">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-accent-600 rounded-xl mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path><a href="{{ route('home') }}"></a>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-primary-800 mb-2"><a href="{{ route('home') }}">BiblioSystem</a></h1>
                <p class="text-primary-600 text-sm">Sistema de Gestión de Biblioteca</p>
            </div>

            <!-- Improved card container with better shadows and styling -->
            <div class="bg-white rounded-2xl shadow-xl border border-primary-200 p-8" data-aos="fade-up"
                data-aos-duration="800" data-aos-delay="200">
                {{ $slot }}
            </div>

            <!-- Added footer with professional styling -->
            <div class="text-center mt-6" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
                <p class="text-primary-500 text-sm">
                    © {{ date('Y') }} {{ config('app.name', 'BiblioSystem') }}. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </div>

    <!-- Added AOS initialization script -->
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 50
        });
    </script>

    @fluxScripts
</body>

</html>
