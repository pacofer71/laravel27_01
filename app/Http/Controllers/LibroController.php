<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;
use App\Rules\Isbn;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('titulo');
        $sinopsis = $request->get('sinopsis');
        $pvp = $request->get('pvp');

        $libros = Libro::orderBy('id')
            ->titulo($titulo)
            ->sinopsis($sinopsis)
            ->pvp($pvp)
            ->paginate(5);
        return view('libros.search', compact('libros', 'request'));
    }

    public function listar()
    {
        $libros = Libro::orderBy('id')->paginate(5);
        return view('libros.listado', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'sinopsis' => 'required',
            'isbn' => ['required', 'unique:libros,isbn', 'isbn'],
            'pvp' => 'required|min:0',
            'stock' => 'required|min:0'

        ]);
        Libro::create($request->all());
        return redirect()->route('libros.listado')->with('mensaje', "Libro Creado Correctamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'sinopsis' => 'required',
            'isbn' => ['required', 'unique:libros,isbn,' . $libro->id, 'isbn'],
            'pvp' => 'required|min:0',
            'stock' => 'required|min:0'

        ]);
        $libro->update($request->all());
        return redirect()->route('libros.listado')->with('mensaje', 'Libro modificado Correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.listado')->with('mensaje', 'Libro Borrado Correctamente');
    }
}
