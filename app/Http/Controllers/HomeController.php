<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $productos = Producto::with(['archivo'])->orderBy('nombre')->get();

        $categorias = Categoria::orderBy('nombre')->get();

        if ($request->has('categoria') && $request->categoria != 'all') {
            $productos = Categoria::find($request->categoria)->productos()->orderBy('nombre')->get();
        }
        
        return view('cliente.homeIndex', compact('productos', 'categorias'))->with('categoriaSeleccionada', $request->categoria ?? 'all');
    }


    public function show(Producto $producto)
    {
        return view('cliente.homeShow', compact('producto'));
    }

    public function favoritos()
    {
        $favoritos = Auth::user()->favoritos;
        return view('cliente.favoritos', compact('favoritos'));
    }

    public function nuevo_favorito(Producto $producto){
        $producto->favoritos()->syncWithoutDetaching([Auth::id() => ['fecha' => date('Y-m-d')]]);
        return redirect()->route('cliente.favoritos')->with('success','Producto agregado a favoritos');
    }

    public function quitar_favorito(Producto $producto){
        $producto->favoritos()->detach(Auth::id());
        return redirect()->route('cliente.favoritos')->with('success','Producto eliminado de favoritos');

    }

    public function vaciar_favoritos(){
        
        Auth::user()->favoritos()->detach();

        return redirect()->route('cliente.favoritos')->with('success', 'Los favoritos se han eliminado correctamente');
    }

    public function busqueda(Request $request){
        $busqueda = $request->busqueda;
        if($busqueda != null){
            $productos = Producto::with(['archivo'])
            ->where('nombre', 'like', '%'.$request->busqueda.'%')
            ->orderBy('nombre')->get();
        }else{
            $productos = Producto::with(['archivo'])->orderBy('nombre')->get();
        }
        $categorias = Categoria::orderBy('nombre')->get();
        $categoriaSeleccionada = "";
        
        return view('cliente.homeIndex', compact('productos','categorias', 'categoriaSeleccionada', 'busqueda'));
    }

}
