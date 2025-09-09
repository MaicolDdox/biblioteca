<div class="space-y-6" data-aos="fade-up" data-aos-duration="600">
    <!-- Header -->
    <div class="text-center space-y-2">
        <h1 class="text-2xl font-semibold text-gray-900">
            Recuperar Contraseña
        </h1>
        <p class="text-sm text-gray-600">
            Ingresa tu email para recibir un enlace de restablecimiento de contraseña
        </p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="p-4 bg-green-50 border border-green-200 rounded-lg text-center">
            <p class="text-sm text-green-700">{{ session('status') }}</p>
        </div>
    @endif

    <!-- Form -->
    <form method="POST" wire:submit="sendPasswordResetLink" class="space-y-6">
        @csrf
        
        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="block text-sm font-medium text-gray-700">
                Dirección de Email
            </label>
            <input
                id="email"
                wire:model="email"
                type="email"
                required
                autofocus
                placeholder="email@ejemplo.com"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('email') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
            />
            @error('email')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button
            type="submit" 
            class="w-full bg-accent-600 hover:bg-accent-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 shadow-sm"
        >
            Enviar Enlace de Restablecimiento
        </button>
    </form>

    <!-- Back to Login -->
    <div class="text-center">
        <p class="text-sm text-gray-600">
            ¿Recordaste tu contraseña? 
            <a href="{{ route('login') }}" 
               wire:navigate
               class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200">
                Iniciar Sesión
            </a>
        </p>
    </div>
</div>