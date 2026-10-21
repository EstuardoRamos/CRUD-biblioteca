<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Requests\StorelibroRequest;
use App\Http\Requests\UpdatelibroRequest;
use App\Models\Autor;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $libros = Libro::with('autor')
                ->latest('id')
                ->paginate(10);

            return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('libros.create', [
            'autores'=>Autor::orderBy('nombre')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibroRequest $request): RedirectResponse
    {
        //
        Libro::create($request->validated());
        return redirect()
                ->route('libros.index')
                ->with('success', 'Libro creado con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(libro $libro)
    {
        //
        return view('libros.edit', [
            'libro' => $libro,
            'autores'=> Autor::orderBy('nombre')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelibroRequest $request, libro $libro)
    {
        //
        $libro ->update($request->validated());

        return redirect()
                ->route('libros.index')
                ->with('success', 'Se actualizo el libro correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(libro $libro)
    {
        $libro->delete();

        return redirect()
            ->route('libros.index')
            ->with('success', 'libro eliminado con exito');
    }
}
