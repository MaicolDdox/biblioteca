<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StudentController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    //Ruta para gestionar libros
    Route::resource('books', BookController::class);
    Route::get('/catalogo', [BookController::class, 'catalogo'])->name('books.catalogo');

    //Ruta Student
    Route::resource('student', StudentController::class);

    //Rutas para prestamos
    Route::resource('loan', LoanController::class);
});

require __DIR__.'/auth.php';
