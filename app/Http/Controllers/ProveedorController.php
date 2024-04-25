<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.proveedorIndex', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.proveedorCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre'=>'required|max:30',
                'direccion'=>'required|max:50',
                'correo'=>'required|email|max:30',
                'telefono' => 'required|digits:10'
            ],[
                'nombre.required' => 'Por favor, proporciona el nombre del proveedor.',
                'direccion.required' => 'Por favor, proporciona la dirección del proveedor.',
                'correo.required' => 'Por favor, proporciona un correo electrónico válido.',
                'correo.email' => 'Por favor, proporciona un correo electrónico válido.',
                'telefono.required' => 'Por favor, proporciona un número de teléfono de 10 dígitos.',
                'telefono.digits' => 'El número de teléfono debe tener exactamente :digits dígitos.',
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.proveedorShow', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.proveedorEdit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate(
            [
                'nombre'=>'required|max:30',
                'direccion'=>'required|max:50',
                'correo'=>'required|email|max:30',
                'telefono' => 'required|digits:10'
            ],[
                'nombre.required' => 'Por favor, proporciona el nombre del proveedor.',
                'direccion.required' => 'Por favor, proporciona la dirección del proveedor.',
                'correo.required' => 'Por favor, proporciona un correo electrónico válido.',
                'correo.email' => 'Por favor, proporciona un correo electrónico válido.',
                'telefono.required' => 'Por favor, proporciona un número de teléfono de 10 dígitos.',
                'telefono.digits' => 'El número de teléfono debe tener exactamente :digits dígitos.',
            ]
        );

        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->correo = $request->correo;
        $proveedor->telefono = $request->telefono;
        $proveedor->estado = $request->estado;
        $proveedor->save(); 

    return redirect()->route('proveedor.show', $proveedor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedor.index')->with('success', 'Proveedor eliminado con éxito');
    }
}