<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;


class CarritoController extends Controller
{

    public function carrito()
    {
        return view('usuario.carrito');
    }

    public function agregarProducto(Request $request, $id)
    {
        $producto = Producto::find($id);
    
        if (!$producto) {
            abort(404);
        }
    
        $carrito = session()->get('carrito');
    
        if (isset($carrito[$id])) {
            if ($request->accion == 'incrementar') {
                $carrito[$id]['cantidad']++;
            }
        } else {
            $carrito[$id] = [
                'producto' => $producto,
                'cantidad' => 1
            ];
        }
    
        session()->put('carrito', $carrito);
        return redirect()->route('carrito')->with('success', 'Producto agregado al carrito exitosamente');

    }
    
    public function quitarProducto(Request $request, $id)
    {
        $carrito = session()->get('carrito');

        if (!isset($carrito[$id])) {
            return redirect()->route('carrito')->with('error', 'El producto no está en el carrito');
        }
        if ($carrito[$id]['cantidad'] > 1) {
            $carrito[$id]['cantidad']--;
        } else {
            unset($carrito[$id]);
        }

        session()->put('carrito', $carrito);
        return redirect()->route('carrito')->with('success', 'Producto quitado del carrito exitosamente');
    }


    public function vaciarCarrito()
    {
        session()->forget('carrito');
        return redirect()->route('carrito')->with('success', 'El carrito se ha vaciado correctamente');
    }
    
}