<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();

        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = New Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->save();

        return redirect()->route('libros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $libro = Libro::with('ejemplares')->find($id);

        if (!$libro) {
            return redirect()->route('libros.index')->with('error', 'El libro no existe');
        }

        $prestamos = Prestamo::pluck('ejemplar_id')->toArray();

        return view('libros.show', compact('libro', 'prestamos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', ['libro'=>$libro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, libro $libro)
    {
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->save();

        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index');
    }

}
