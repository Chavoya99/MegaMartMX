<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

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

    public function view(User $user): bool
    {
        return $user->tipo_usuario == "superAdmin";
    }
}
