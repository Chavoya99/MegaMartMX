<?php

namespace App\Policies;

use App\Models\Compra;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function ver_carrito(User $user)
    {      
        return session('carrito') !== null && count(session('carrito')) > 0 ? Response::allow()
        : Response::denyWithStatus(404);
    }

    public function delete(User $user)
    {
        return $user->tipo_usuario == "superAdmin";
    }

    public function view(User $user)
    {
        return $user->tipo_usuario == "superAdmin" ? Response::allow()
        : Response::denyWithStatus(404);;
    }

    public function ver_compra_cliente(User $user, Compra $compra){
        if($user->tipo_usuario == "cliente"){
            return $user->id == $compra->user_id ? Response::allow()
            : Response::denyWithStatus(404);
        }else if($user->tipo_usuario == 'superAdmin'){
            return true;
        }

        return false ? Response::allow()
        : Response::denyWithStatus(404);
        
    }
}
