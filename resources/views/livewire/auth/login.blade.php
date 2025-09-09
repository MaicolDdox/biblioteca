<div class="space-y-6">
    <!-- Added professional header with consistent styling -->
    <div class="text-center space-y-2" data-aos="fade-down" data-aos-delay="300">
        <h2 class="text-2xl font-bold text-primary-800">Iniciar Sesión</h2>
        <p class="text-primary-600 text-sm">Ingresa tu email y contraseña para acceder</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="bg-accent-50 border border-accent-200 text-accent-700 px-4 py-3 rounded-lg text-sm text-center" data-aos="fade-in">
            {{ session('status') }}
        </div>
    @endif

    <!-- Styled login form with professional inputs and consistent design -->
    <form method="POST" wire:submit="login" class="space-y-5" data-aos="fade-up" data-aos-delay="400">
        @csrf
        
        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="block text-sm font-medium text-primary-700">
                Correo Electrónico
            </label>
            <input
                wire:model="email"
                id="email"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="correo@ejemplo.com"
                class="w-full px-4 py-3 border border-primary-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500 transition-colors duration-200 text-primary-900 placeholder-primary-400"
            />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium text-primary-700">
                    Contraseña
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" 
                       class="text-sm text-accent-600 hover:text-accent-700 transition-colors duration-200"
                       wire:navigate>
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>
            <input
                wire:model="password"
                id="password"
                type="password"
                required
                autocomplete="current-password"
                placeholder="Contraseña"
                class="w-full px-4 py-3 border border-primary-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500 transition-colors duration-200 text-primary-900 placeholder-primary-400"
            />
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input
                wire:model="remember"
                id="remember"
                type="checkbox"
                class="h-4 w-4 text-accent-600 focus:ring-accent-500 border-primary-300 rounded transition-colors duration-200"
            />
            <label for="remember" class="ml-2 block text-sm text-primary-700">
                Recordarme
            </label>
        </div>

        <!-- Professional submit button with hover effects -->
        <button 
            type="submit" 
            class="w-full bg-accent-600 hover:bg-accent-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 shadow-sm"
        >
            Iniciar Sesión
        </button>
    </form>

    <!-- Registration link with consistent styling -->
    @if (Route::has('register'))
        <div class="text-center pt-4 border-t border-primary-200" data-aos="fade-up" data-aos-delay="500">
            <p class="text-sm text-primary-600">
                ¿No tienes una cuenta? 
                <a href="{{ route('register') }}" 
                   class="text-accent-600 hover:text-accent-700 font-medium transition-colors duration-200"
                   wire:navigate>
                    Regístrate aquí
                </a>
            </p>
        </div>
    @endif
</div>