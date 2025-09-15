<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('container.books.index', compact('books'));
    }

    public function catalogo()
    {
        $books = Book::all();
        return view('container.books.catalogo', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('container.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo'           => 'required|string|max:255',
            'autor'            => 'required|string|max:255',
            'year_publicacion' => 'required|date',
        ]);

        Book::create($validated);  // asegurate que $fillable en Book tenga esos campos
        return redirect()->route('books.index')
            ->with('success', 'Libro creado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Retorna una vista con el libro individual
        return view('container.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        // Muestra el formulario de edición
        return view('container.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'titulo'           => 'required|string|max:255',
            'autor'            => 'required|string|max:255',
            'year_publicacion' => 'required|date',
            'estado'           => 'required|in:disponible,prestado',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Libro actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Libro eliminado correctamente.');
    }
}
