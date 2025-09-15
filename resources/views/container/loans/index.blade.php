@extends('dashboard')

@section('title', 'Préstamos')

@section('content')
<div class="p-6 space-y-6" data-aos="fade-up">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-primary-800">Listado de Préstamos</h1>
            <p class="text-primary-600 mt-1">Consulta los préstamos realizados por los estudiantes</p>
        </div>
    </div>

    <!-- Tabla de préstamos -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 border border-slate-200 rounded-lg shadow-sm">
            <thead class="bg-slate-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">#</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">Estudiante</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">Email</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">Libro</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">Fecha préstamo</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-slate-700">Fecha devolución</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-slate-700">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse ($loans as $loan)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ $loop->iteration + ($loans->currentPage() - 1) * $loans->perPage() }}
                        </td>
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ optional($loan->student->user)->name ?? '—' }}
                        </td>
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ optional($loan->student->user)->email ?? '—' }}
                        </td>
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ $loan->book->titulo ?? '—' }}
                        </td>
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ \Carbon\Carbon::parse($loan->fecha_prestamo)->format('d/m/Y') }}
                        </td>
                        <td class="px-4 py-3 text-sm text-slate-700">
                            {{ \Carbon\Carbon::parse($loan->fecha_devolucion)->format('d/m/Y') }}
                        </td>
                        <td class="px-4 py-3 text-center text-sm">
                            <div class="flex justify-center gap-2">
                                @if($loan->book && $loan->book->estado === 'disponible')
                                    {{-- Botón desactivado si el libro ya está disponible --}}
                                    <button disabled
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-slate-400 bg-slate-200 rounded cursor-not-allowed">
                                        Cancelar préstamo
                                    </button>
                                @else
                                    {{-- Botón activo si el libro sigue prestado --}}
                                    <form action="{{ route('loan.destroy', $loan) }}" method="POST"
                                          onsubmit="return confirm('¿Seguro que deseas cancelar este préstamo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                            Cancelar préstamo
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-slate-500">
                            No hay préstamos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $loans->links() }}
    </div>
</div>

<!-- Script AOS opcional -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        AOS.init({ duration: 600, easing: 'ease-in-out', once: true, offset: 50 });
    });
</script>
@endsection
