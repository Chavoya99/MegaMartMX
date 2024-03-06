<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
>>>>>>> a2a4001274c8d159f9a4121f154341df3ffcfaea

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $proveedores = Proveedor::all();
        return view('proveedores.proveedorIndex', compact('proveedores'));
=======
        //

        $producto = Proveedor::all();

        return view('proveedor.proveedorIndex', compact('proveedores'));
>>>>>>> a2a4001274c8d159f9a4121f154341df3ffcfaea
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        return view('proveedores.proveedorCreate');
=======
        //
>>>>>>> a2a4001274c8d159f9a4121f154341df3ffcfaea
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $request->validate(
            [
                'nombre'=>'required|max:30',
                'direccion'=>'required|max:50',
                'correo'=>'required|email|max:30',
                'telefono' =>'required|max:10'
            ]
        );

        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->correo = $request->correo;
        $proveedor->telefono = $request->telefono;
        $proveedor->estado = $request->estado;
        $proveedor->save();

        return redirect()->route('proveedor.index');
=======
        //
>>>>>>> a2a4001274c8d159f9a4121f154341df3ffcfaea
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.proveedorShow', compact('proveedor'));
=======
    public function show(Proveedor $Proveedor)
    {
        //
>>>>>>> a2a4001274c8d159f9a4121f154341df3ffcfaea
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.proveedorEdit', compact('proveedor'));
=======
    public function edit(Proveedor $Proveedor)
    {
        //
>>>>>>> a2a4001274c8d159f9a4121f154341df3ffcfaea
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'direccion'=>'required|max:50',
            'correo'=>'required|email|max:30',
            'telefono' =>'required|max:10'
        ]);

        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->correo = $request->correo;
        $proveedor->telefono = $request->telefono;
        $proveedor->estado = $request->estado;
        $proveedor->save(); 

    return redirect()->route('proveedor.show', $proveedor);
=======
    public function update(Request $request, Proveedor $Proveedor)
    {
        //
>>>>>>> a2a4001274c8d159f9a4121f154341df3ffcfaea
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedor.index')->with('success', 'Proveedor eliminado con éxito');
=======
    public function destroy(Proveedor $Proveedor)
    {
        //
>>>>>>> a2a4001274c8d159f9a4121f154341df3ffcfaea
    }
}