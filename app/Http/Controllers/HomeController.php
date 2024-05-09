<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $productos = Producto::with(['categoria', 'subcategoria', 'proveedor', 'archivo'])->orderBy('nombre')->get();

        if ($request->has('categoria') && $request->categoria != 'all') {
            $productos = Categoria::find($request->categoria)->productos;
        }
        
        $categorias = Categoria::all();

        return view('usuario.homeIndex', compact('productos', 'categorias'))->with('categoriaSeleccionada', $request->categoria ?? 'all');
    }


    public function show(Producto $producto)
    {
        return view('usuario.homeShow', compact('producto'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
