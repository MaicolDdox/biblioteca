<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Student;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $grado = ''; // ✅ Nuevo campo

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'grado' => ['required', 'string', 'max:255'], // ✅ Validar grado
        ]);

        // Crear usuario
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $user->assignRole('estudiante');

        // Crear registro en la tabla students
        Student::create([
            'user_id' => $user->id,
            'grado'   => $validated['grado'],
        ]);

        event(new Registered($user));

        Auth::login($user);


        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
