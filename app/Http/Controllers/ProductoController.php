<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        $productos = Producto::with(['categoria', 'subcategoria', 'proveedor', 'archivo'])->orderBy('nombre')->get();
        

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

        

        if($request->hasFile('imagen')){
            if ($request->file('imagen')->isValid()) {

                $request->validate([
                    'imagen' => 'file|mimes:jpg,jpeg,png|max:4096'
                ],[
                    'imagen.mimes' => 'Sólo se permiten imágenes',
                    'imagen.max' => 'La imagen no debe pesar más de 4mb'
                ]);
                $producto = Producto::create($request->all());

                $imagen = $request->file('imagen');
                $nombre_original = $imagen->getClientOriginalName();
                //$ubicacion = $imagen->storeAs('archivos_productos', $nombre_original, 'public');
                $ubicacion = $imagen->store('archivos_productos', 'public');
                $producto->archivo()->create(
                    [
                        'ubicacion' => $ubicacion,
                        'nombre_original' => $nombre_original,
                        'mime' => $request->file('imagen')->getClientMimeType(),
                    ]
                );
                
            }
        }else{
            $producto = Producto::create($request->all());
        }

        return redirect()->route('producto.index')->with('success', 'Producto creado con éxito');
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

        if($request->hasFile('imagen')){
            if ($request->file('imagen')->isValid()) {

                $request->validate([
                    'imagen' => 'file|mimes:jpg,jpeg,png|max:4096'
                ],[
                    'imagen.mimes' => 'Sólo se permiten imágenes',
                    'imagen.max' => 'La imagen no debe pesar más de 4mb'
                ]);

                $imagen = $request->file('imagen');
                $nombre_original = $imagen->getClientOriginalName();
                //$ubicacion = $imagen->storeAs('archivos_productos', $nombre_original, 'public');
                $ubicacion = $imagen->store('archivos_productos', 'public');

                if($producto->archivo){
                    Storage::disk('public')->delete($producto->archivo->ubicacion);
                    $producto->archivo->update(
                        [
                            'ubicacion' => $ubicacion,
                            'nombre_original' => $nombre_original,
                            'mime' => $request->file('imagen')->getClientMimeType(),
                        ]
                    );
                }else{
                    $producto->archivo()->create(
                        [
                            'ubicacion' => $ubicacion,
                            'nombre_original' => $nombre_original,
                            'mime' => $request->file('imagen')->getClientMimeType(),
                        ]
                    );
                }
            }
        }

        return redirect()->route('producto.show', $producto)->with('success', 'Producto modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {   
        $this->authorize('delete', Auth::user());
        $producto->delete();
        return redirect()->route('producto.index')->with('success', 'Producto eliminado con éxito');
    }
}
