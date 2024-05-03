<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClienteMiddleware;
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
        Route::resource('proveedor', ProveedorController::class);
    });
    

    Route::get('/clientes', function(){
        return "clientes";
    })->name('clientes')->middleware(ClienteMiddleware::class);
    
    Route::get('/admin', function(){
        return "admin";
    })->name('clientes')->middleware(
    AdminMiddleware::class);

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
