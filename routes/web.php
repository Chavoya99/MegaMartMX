<?php


use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\SomosController;
use App\Http\Controllers\ayudaController;
use App\Http\Controllers\FavoritosController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClienteMiddleware;
use App\Models\Compra;
use Illuminate\Mail\Markdown;
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



Route::get('/home_invitado', [HomeController::class, 'index'])->name('clientes_guest')->middleware('guest');
Route::get('/ayuda', [AyudaController::class, 'ayuda'])->name('ayuda')->middleware('guest');
Route::get('/Somos', [SomosController::class, 'somos'])->name('somos')->middleware('guest');

Route::get('/', function () {
    return redirect(route('clientes_guest'));
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

        Route::get('/ver_ventas', [CompraController::class, 'index_admin'])->name('admin.ver_ventas');
        Route::get('/detalle_compra/{compra}', [CompraController::class, 'show_admin'])->name('admin.detalle_compra');

        Route::delete('eliminar_proveedor_permanente/{proveedor}', 
        [ProveedorController::class, 'eliminar_proveedor_permanente'])
        ->name('borrar_proveedor');
    });
    

    Route::middleware(ClienteMiddleware::class)->group(function(){
        Route::controller(HomeController::class)->group(function(){
            Route::get('/cliente/homeIndex', 'index')->name('cliente.homeIndex');
            Route::get('/cliente/favoritos', 'favoritos')->name('cliente.favoritos');
            Route::post('/cliente/nuevo_favorito/{producto}', 'nuevo_favorito')->name('cliente.nuevo_favorito');
            Route::post('/cliente/quitar_favorito/{producto}', 'quitar_favorito')->name('cliente.quitar_favorito');
            Route::get('/cliente/producto/{producto}', 'show')->name('cliente.producto.show');
        });
    
        Route::get('/cliente/ayuda', [AyudaController::class, 'ayuda'])->name('cliente.ayuda');

        Route::get('/cliente/Somos', [SomosController::class, 'somos'])->name('cliente.somos');
        

        Route::delete('/cliente/favoritos', [FavoritosController::class, 'eliminarFavoritos'])->name('favoritos.vaciar');
        Route::get('/cliente/carrito/agregar/{producto}', [CarritoController::class, 'agregarProductoGet'])->name('cliente.carrito.agregar.get');
        
        Route::get('/cliente/mis_compras', [CompraController::class, 'index_cliente'])->name('cliente.mis_compras');
        Route::get('/cliente/detalle_compra/{compra}', [CompraController::class, 'show_cliente'])->name('cliente.detalle_compra');

        Route::controller(CarritoController::class)->group(function(){
            Route::get('/carrito', 'carrito')->name('carrito');
            Route::post('/carrito/agregar/{id}', 'agregarProducto')->name('carrito.agregar');
            Route::post('/carrito/quitar/{id}', 'quitarProducto')->name('carrito.quitar');
            Route::post('/carrito/vaciar', 'vaciarCarrito')->name('carrito.vaciar');
            Route::get('/carrito/confirmar', 'confirmarCarrito')->name('carrito.confirmar');
            Route::post('/carrito/comprar/{subtotal}/{total}/{envio}', 'confirmarCompraCarrito')->name('carrito.comprar');
        });


        
    });
    


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
            return redirect(route('cliente.homeIndex'));
        }
    })->name('dashboard');
});




