<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    public function eliminarFavoritos()
    {
        $favoritos = auth()->user()->favoritos;
        $favoritos->each->delete();

        return redirect()->route('favoritos.vaciar')->with('success', 'Los favoritos se han eliminado correctamente');


    }
}
