<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClienteMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});


Route::middleware('auth')->group(function(){
    

    Route::middleware(AdminMiddleware::class)->group(function(){
        Route::resource('producto', ProductoController::class);
        Route::resource('categoria', CategoriaController::class);
        Route::resource('subcategoria', SubcategoriaController::class);
        Route::resource('proveedor', ProveedorController::class);
        Route::delete('eliminar_proveedor_permanente/{proveedor}', 
        [ProveedorController::class, 'eliminar_proveedor_permanente'])
        ->name('borrar_proveedor');
    });
    

    Route::get('/clientes', function(){
        return view('clientes');
    })->name('clientes')->middleware(ClienteMiddleware::class);

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::user()->tipo_usuario == "superAdmin" || Auth::user()->tipo_usuario == "admin"){
            return redirect(route('producto.index'));
        }else if(Auth::user()->tipo_usuario == "cliente"){
            return redirect(route('clientes'));
        }
    })->name('dashboard');
});
