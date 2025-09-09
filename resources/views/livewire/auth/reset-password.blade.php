<div class="space-y-6" data-aos="fade-up" data-aos-duration="600">
    <!-- Header -->
    <div class="text-center space-y-2">
        <h1 class="text-2xl font-semibold text-primary-900">Restablecer Contraseña</h1>
        <p class="text-primary-600">Por favor ingresa tu nueva contraseña a continuación</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-center" data-aos="fade-in">
            {{ session('status') }}
        </div>
    @endif

    <!-- Reset Password Form -->
    <form method="POST" wire:submit="resetPassword" class="space-y-5" data-aos="fade-up" data-aos-delay="200">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="block text-sm font-medium text-primary-700">
                Correo Electrónico
            </label>
            <input wire:model="email" id="email" name="email" type="email" required autocomplete="email"
                readonly
                class="w-full px-4 py-3 border border-primary-200 rounded-lg bg-primary-50 text-primary-900 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 cursor-not-allowed" />
            @error('email')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="block text-sm font-medium text-primary-700">
                Nueva Contraseña
            </label>
            <div class="relative">
                <input wire:model="password" id="password" name="password" type="password" required
                    autocomplete="new-password" placeholder="Ingresa tu nueva contraseña"
                    class="w-full px-4 py-3 pr-12 border border-primary-200 rounded-lg bg-white text-primary-900 placeholder-primary-400 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200" />
                <button type="button" onclick="togglePassword('password')"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-primary-400 hover:text-primary-600 transition-colors">
                    <svg id="password-eye" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </button>
            </div>
            @error('password')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <label for="password_confirmation" class="block text-sm font-medium text-primary-700">
                Confirmar Contraseña
            </label>
            <div class="relative">
                <input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation"
                    type="password" required autocomplete="new-password" placeholder="Confirma tu nueva contraseña"
                    class="w-full px-4 py-3 pr-12 border border-primary-200 rounded-lg bg-white text-primary-900 placeholder-primary-400 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200" />
                <button type="button" onclick="togglePassword('password_confirmation')"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-primary-400 hover:text-primary-600 transition-colors">
                    <svg id="password_confirmation-eye" class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </button>
            </div>
            @error('password_confirmation')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
            data-aos="fade-up" data-aos-delay="400">
            Restablecer Contraseña
        </button>
    </form>
</div>

<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const eye = document.getElementById(fieldId + '-eye');

        if (field.type === 'password') {
            field.type = 'text';
            eye.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
        `;
        } else {
            field.type = 'password';
            eye.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
        `;
        }
    }
</script>
