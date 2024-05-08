<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarritoController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect(route('login'));
});


Route::middleware('auth')->group(function(){
    

    Route::middleware(AdminMiddleware::class)->group(function(){
        Route::resource('producto', ProductoController::class);
        Route::resource('categoria', CategoriaController::class);
        Route::resource('proveedor', ProveedorController::class);

        Route::controller(SubcategoriaController::class)->group(function(){
            Route::get('subcategoria/create/categoria/{categoria}', 'create')->name('subcategoria.create');

            Route::get('subcategoria/{subcategoria}/edit/categoria/{categoria}', 'edit')->name('subcategoria.edit');

            Route::post('subcategoria/{categoria}', 'store')->name('subcategoria.store');

            Route::patch('subcategoria/{subcategoria}/{categoria}', 'update')->name('subcategoria.update');

            Route::delete('subcategoria/{subcategoria}/{categoria}', 'destroy')->name('subcategoria.destroy');
        });
        

        Route::get('/producto/download/{archivo}', [ProductoController::class, 'download'])->name('archivo.download');

        Route::delete('eliminar_proveedor_permanente/{proveedor}', 
        [ProveedorController::class, 'eliminar_proveedor_permanente'])
        ->name('borrar_proveedor');
    });
    

    Route::middleware(ClienteMiddleware::class)->group(function(){
        Route::controller(HomeController::class)->group(function(){
            Route::get('/clientes', 'index')->name('clientes')->middleware(ClienteMiddleware::class);
        });

    });
    
    Route::get('/', function () {
        return redirect()->route('usuario.homeIndex', ['categoria' => 'all']);
    });

    Route::get('/usuario/producto/{producto}', [HomeController::class, 'show'])->name('usuario.producto.show');
    Route::get('/usuario/homeIndex', [HomeController::class, 'index'])->name('usuario.homeIndex');
    Route::get('/home', [HomeController::class, 'index'])->name('homeIndex');

    Route::get('/carrito', [CarritoController::class, 'carrito'])->name('carrito');
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregarProducto'])->name('carrito.agregar');
    Route::post('/carrito/quitar/{id}', [CarritoController::class, 'quitarProducto'])->name('carrito.quitar');
    Route::post('carrito/vaciar', [CarritoController::class, 'vaciarCarrito'])->name('carrito.vaciar');


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




