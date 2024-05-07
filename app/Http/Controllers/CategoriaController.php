<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::with('subcategorias')->get();
        return view('categorias.categoriaIndex', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.categoriaCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required:max:255|unique:categorias,nombre',
        ],
        [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.unique' => 'El nombre de la categoría ya existe'
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categoria.index')->with('success', 'Categoría creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categorium)
    {
        $categoria = $categorium;
        return view('categorias.categoriaShow', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categorium)
    {
        $categoria = $categorium;
        return view('categorias.categoriaEdit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categorium)
    {
        $categoria = $categorium;
        $request->validate([
            'nombre' => ['required',
                Rule::unique('categorias')->ignore($categoria->id)],
        ]);

        $categoria->update(['nombre' => $request->nombre]);

        return redirect()->route('categoria.index')->with('success', 'Categoría modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categorium)
    {
        $this->authorize('delete', Auth::user());
        $categorium->delete();
        return redirect()->route('categoria.index')->with('success', 'Categoría eliminada con éxito');
    }
}

