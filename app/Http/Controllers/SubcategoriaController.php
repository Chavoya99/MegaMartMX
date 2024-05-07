<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Categoria $categoria)
    {
        return view('subcategorias.subcategoriaCreate', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Categoria $categoria)
    {

        $request->validate([
            'nombre' => 'required:max:255|unique:subcategorias,nombre',
        ],
        [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.unique' => 'El nombre de la subcategoría ya existe'
        ]);

        Subcategoria::create(
            [
                'nombre' => $request->nombre,
                'categoria_id' => $categoria->id,
            ]
        );

        return redirect()->route('categoria.show', $categoria)->with('success', 'Subcategoría creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategoria $subcategorium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategoria $subcategoria, Categoria $categoria)
    {
        return view('subcategorias.subcategoriaEdit', compact('subcategoria', 'categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategoria $subcategoria, Categoria $categoria)
    {
        $request->validate([
            'nombre' => ['required',
                Rule::unique('subcategorias')->ignore($subcategoria->id)],
        ],
        [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.unique' => 'El nombre de la subcategoría ya existe'
        ]);

        $subcategoria->update(['nombre' => $request->nombre]);

        return redirect()->route('categoria.show', $categoria)->with('success', 'Subcategoría modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategoria $subcategoria, $categoria)
    {
        $subcategoria->delete();
        return redirect()->route('categoria.show', $categoria)->with('success', 'Subcategoría eliminada con éxito');
    }
}
