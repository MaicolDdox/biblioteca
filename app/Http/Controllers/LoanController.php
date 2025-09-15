<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Student;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Muestra un listado de los préstamos registrados.
     */
    public function index()
    {
        // Obtiene los registros de la tabla loans junto con:
        // - La relación 'student' de cada préstamo
        // - El 'user' que pertenece a ese 'student'
        // - La relación 'book' (libro prestado)
        //
        // 'with' hace eager loading para evitar el problema N+1,
        // es decir, reduce la cantidad de consultas a la base de datos.
        //
        // paginate(10) divide los resultados en páginas de 10 préstamos.
        $loans = Loan::with(['student.user', 'book'])->paginate(10);

        // Retorna la vista ubicada en resources/views/container/loans/index.blade.php
        // y le pasa la variable $loans para que pueda ser usada dentro del Blade.
        return view('container.loans.index', compact('loans'));
    }


    /**
     * Formulario de creación.
     */

    public function create(Request $request)
    {
        // 1. Tomar el libro desde el query string
        $bookId = $request->query('book_id');
        $book   = Book::findOrFail($bookId);

        // 2. Verificar que el usuario esté logueado
        $user = auth()->user();

        // 3. Comprobar que el usuario tenga el rol "estudiante"
        if (! $user || ! $user->hasRole('estudiante')) {
            abort(403, 'Solo los estudiantes pueden solicitar préstamos.');
        }

        // 4. Traer su relación student (debe existir en la BD)
        $student = $user->student;

        if (! $student) {
            abort(404, 'No se encontró el perfil de estudiante para este usuario.');
        }

        // 5. Pasar a la vista
        return view('container.loans.create', compact('book', 'student'));
    }



    /**
     * Guardar préstamo.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_id' => 'required|exists:books,id',
            'fecha_devolucion' => 'required|date|after:today'
        ]);

        $validated['fecha_prestamo'] = now();

        $loan = Loan::create($validated);

        // Cambiar estado del libro
        $book = Book::find($validated['book_id']);
        $book->update(['estado' => 'prestado']);

        return redirect()->route('loan.index')
            ->with('success', 'Préstamo creado correctamente');
    }

    /**
     * Eliminar préstamo.
     */
    public function destroy(Loan $loan)
    {
        // 1. Cambiar el estado del libro a disponible
        $loan->book->update(['estado' => 'disponible']);

        // 2. NO eliminamos el préstamo: simplemente lo dejamos en la base de datos
        //    para conservar el historial.

        return redirect()
            ->route('loan.index')
            ->with('success', 'El libro fue marcado como disponible. El registro del préstamo se mantiene.');
    }
}
