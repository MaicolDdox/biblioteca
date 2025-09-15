@extends('dashboard')

@section('title', 'Estudiantes')

@section('content')
<div class="p-6 space-y-6" data-aos="fade-up">

    <!-- Encabezado -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-primary-800">Listado de Estudiantes</h1>
            <p class="text-primary-600 mt-1">Usuarios registrados con el rol <strong>estudiante</strong></p>
        </div>
    </div>

    <!-- Tabla de estudiantes -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 border border-slate-200 rounded-lg shadow-sm">
            <thead class="bg-slate-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">#</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">Nombre</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">Email</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">Grado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse ($users as $user)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <!-- Número consecutivo tomando en cuenta la paginación -->
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                        </td>

                        <!-- Nombre del usuario -->
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ $user->name }}
                        </td>

                        <!-- Email -->
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ $user->email }}
                        </td>

                        <!-- Grado del estudiante (relación 1:1 con la tabla students) -->
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ optional($user->student)->grado ?? '—' }}
                        </td>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-500">
                            No hay estudiantes registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>

<!-- AOS opcional -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true,
            offset: 50
        });
    });
</script>
@endsection
