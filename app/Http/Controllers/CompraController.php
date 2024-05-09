<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_cliente()
    {   
        $compras = Auth::user()->compras;
        return view('cliente.misCompras', compact('compras'));
    }

    /**
     * Display the specified resource.
     */
    public function show_cliente(Compra $compra)
    {
        
        $this->authorize('ver_compra_cliente', $compra);
        $productos = $compra->productos;

        return view('cliente.detalle_compra', compact('productos', 'compra'));
    }

    public function index_admin()
    {   
        $this->authorize('view', Auth::user());
        $compras = Compra::with('user')->get();
        return view('admin.verVentas', compact('compras'));
    }

    /**
     * Display the specified resource.
     */
    public function show_admin(Compra $compra)
    {
        
        $this->authorize('ver_compra_cliente', $compra);
        $productos = $compra->productos;
        return view('admin.verDetalleVenta', compact('productos', 'compra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
