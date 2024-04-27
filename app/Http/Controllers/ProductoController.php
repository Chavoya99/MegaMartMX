<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
        $proveedores = Proveedor::orderBy('nombre', 'desc')->get();
        return view('productos.productoCreate', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre'=>'required|max:50',
                'categoria_id' => 'required',
                'subcategoria_id' => 'required',
                'precio'=> 'required|regex:/^(?=.*[1-9])\d*(\.\d+)?$/',
                'codigoBarras' =>'required|integer|digits_between:3,13|unique:productos,codigoBarras',
                'existencia' => ['required', 'integer'],
                'proveedor_id' => 'required',

            ],[
                'nombre.required' => 'El campo nombre es obligatorio',
                'categoria_id.required' => 'Debe seleccionar una categoria',
                'subcategoria_id.required' => 'Debe seleccionar una subcategoria',
                'precio.required' => 'Debe incluir un precio',
                'precio.regex' => 'Introduce un número válido',
                'codigoBarras.required' => 'El campo código de barras es obligatorio',
                'codigoBarras.digits_between' => 'El código de barras debe tener entre :min y :max dígitos',
                'codigoBarras.integer' => 'Introduce un código de barras válido',
                'codigoBarras.unique' => 'Código de barras duplicado',
                'existencia.required' => 'Debe especificar una cantidad en existencia',
                'proveedor_id.required' => 'Debe seleccionar un proveedor',
            ]
        );

        $producto = Producto::create($request->all());

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
        $categorias = Categoria::orderBy('nombre')->get();
        $proveedores = Proveedor::orderBy('nombre')->get();
        return view('productos.productoEdit', compact('producto', 'categorias', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate(
            [
                'nombre'=>'required|max:50',
                'categoria_id' => 'required',
                'subcategoria_id' => 'required',
                'precio'=> 'required|regex:/^(?=.*[1-9])\d*(\.\d+)?$/',
                'codigoBarras' =>['required','integer','digits_between:3,13',
                'existencia' => ['required', 'integer'],
                'proveedor_id' => 'required',
                Rule::unique('productos')->ignore($producto->id)],

            ],[
                'nombre.required' => 'El campo nombre es obligatorio',
                'categoria_id.required' => 'Debe seleccionar una categoria',
                'subcategoria_id.required' => 'Debe seleccionar una subcategoria',
                'precio.required' => 'Debe incluir un precio',
                'precio.regex' => 'Introduce un número válido',
                'codigoBarras.required' => 'El campo código de barras es obligatorio',
                'codigoBarras.digits_between' => 'El código de barras debe tener entre :min y :max dígitos',
                'codigoBarras.integer' => 'Introduce un código de barras válido',
                'codigoBarras.unique' => 'Código de barras duplicado',
                'existencia.required' => 'Debe especificar una cantidad en existencia',
                'proveedor_id.required' => 'Debe seleccionar un proveedor',
                
            ]
        );

        $producto->update($request->all());

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
