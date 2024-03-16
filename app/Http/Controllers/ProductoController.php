<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//->except('index', 'show');
        //->only() especificar los metodos
       
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::all();

        return view('productos.productoIndex', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.productoCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre'=>'required|max:50',
                'precio'=> 'required',
                'codigoBarras' =>'required|min:6|max:13'

            ]
        );

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->subCategoria = $request->subCategoria;
        $producto->precio = $request->precio;
        $producto->codigoBarras = $request->codigoBarras;
        $producto->save();

        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        
        return view('productos.productoShow', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('productos.productoEdit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate(
            [
                'nombre'=>'required|max:50',
                'precio'=> 'required',
                'codigoBarras' =>'required|min:6|max:13'

            ]
        );

        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->subCategoria = $request->subCategoria;
        $producto->precio = $request->precio;
        $producto->codigoBarras = $request->codigoBarras;
        $producto->save();

        return redirect()->route('producto.show', $producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
