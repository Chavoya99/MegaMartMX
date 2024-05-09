<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Producto;
use DateTime;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;


class CarritoController extends Controller
{

    public function carrito()
    {
        return view('cliente.carrito');
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

    public function confirmarCarrito(){

        $carrito = session()->get('carrito');

        return view('cliente.confirmarCarrito', compact('carrito'));
    }

    public function confirmarCompraCarrito($subtotal, $total,){
        $carrito = session()->get('carrito');
        $compra = Compra::Create([
            'user_id' => Auth::id(),
            'total' => $total,
            'fecha' => date('Y-m-d H:i:s'),
        ]);

        foreach($carrito as $item){
            $producto_id = $item['producto']->id;
            $nombre_producto = $item['producto']->nombre;
            $cantidad = $item['cantidad'];
            $precio_unitario = $item['producto']->precio;
            $subtotal = $item['cantidad'] * $precio_unitario;

            $compra->productos()->attach($producto_id, [
                'nombre_producto' => $nombre_producto, 
                'cantidad' => $cantidad, 
                'precio_unitario' => $precio_unitario, 
                'subtotal' => $subtotal]);
        }

        return redirect()->route('cliente.mis_compras');
    }
}   