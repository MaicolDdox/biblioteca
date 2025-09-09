<div class="space-y-6" data-aos="fade-up" data-aos-duration="600">
    <!-- Header -->
    <div class="text-center space-y-2">
        <h1 class="text-2xl font-bold text-primary-900">
            Confirmar Contraseña
        </h1>
        <p class="text-primary-600 text-sm leading-relaxed">
            Esta es un área segura de la aplicación. Por favor confirma tu contraseña antes de continuar.
        </p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-center text-sm" data-aos="fade-in">
            {{ session('status') }}
        </div>
    @endif

    <!-- Confirm Password Form -->
    <form method="POST" wire:submit="confirmPassword" class="space-y-6">
        @csrf
        
        <!-- Password Field -->
        <div class="space-y-2" data-aos="fade-up" data-aos-delay="100">
            <label for="password" class="block text-sm font-medium text-primary-700">
                Contraseña
            </label>
            <div class="relative">
                <input 
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    required 
                    autocomplete="current-password"
                    placeholder="Ingresa tu contraseña"
                    class="w-full px-4 py-3 border border-primary-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 bg-white text-primary-900 placeholder-primary-400"
                />
                <!-- Show/Hide Password Toggle -->
                <button 
                    type="button" 
                    onclick="togglePassword('password')"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-primary-400 hover:text-primary-600 transition-colors duration-200"
                >
                    <svg id="eye-open" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg id="eye-closed" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                    </svg>
                </button>
            </div>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Button -->
        <button 
            type="submit" 
            class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
            data-aos="fade-up" 
            data-aos-delay="200"
        >
            Confirmar
        </button>
    </form>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const eyeOpen = document.getElementById('eye-open');
    const eyeClosed = document.getElementById('eye-closed');
    
    if (field.type === 'password') {
        field.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
    } else {
        field.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeClosed.classList.add('hidden');
    }
}
</script>
