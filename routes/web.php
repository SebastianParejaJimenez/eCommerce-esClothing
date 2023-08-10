<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\UsuariosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/', 'tienda');

Route::post('/session', [CarritoController::class, 'session'])->name('session');
Route::get('/success', [CarritoController::class, 'confirmarCarrito'])->name('success');
Route::get('/cancel', [CarritoController::class, 'cancel'])->name('cancel');

Route::post('logout', [LoginController::class, 'logout'])->name('cierre_sesion');
Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

//Routes Carrito
Route::post('/agregaritem', [App\Http\Controllers\CarritoController::class, 'agregaritem'])->name('agregaritem');
Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'vercarrito'])->name('carrito_detalles');
Route::get('/incrementar/{id}', [App\Http\Controllers\CarritoController::class, 'incrementarCantidad'])->name('incrementarcantidad');
Route::get('/decrementar/{id}', [App\Http\Controllers\CarritoController::class, 'decrementarCantidad'])->name('decrementarcantidad');
Route::get('/eliminaritem/{id}', [App\Http\Controllers\CarritoController::class, 'eliminarItem'])->name('eliminaritem');
Route::get('/eliminarcarrito', [App\Http\Controllers\CarritoController::class, 'eliminarCarrito'])->name('eliminarcarrito');
Route::get('/confirmarcarrito', [App\Http\Controllers\CarritoController::class, 'confirmarCarrito'])->name('confirmarcarrito');


//Routes Vistas Tienda
Route::controller(StoreController::class)->group(function(){
    Route::get('/tienda', 'index')->name('tienda');
    Route::get('/catalogo', 'catalogoVista')->name('catalogo');
    Route::get('/catalogo/{categoria}', 'catalogoVista')->name('catalogo_categoria');

});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function() {
        return view('pages/utility/404');
    });

    //Rutas Productos
    Route::resource('productos', ProductosController::class);
    Route::controller(ProductosController::class)->group(function(){
        Route::get('/productos', 'index')->name('productos');
        Route::post('productos', 'store')->name('productos.store');
        Route::get('productos/create', 'create')->name('producto_crear');

        Route::get('/productos/{id}/editar', [ProductosController::class, 'edit'])->name('productos.edit');
        Route::post('/productos/{id}', [ProductosController::class, 'update'])->name('productos.update');
        Route::post('/productos/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');
        Route::get('/productos/{id}/{slug}', [ProductosController::class, 'show'])->name('productos.show');


        Route::put('/productos/{id}/sumar', [ProductosController::class, 'sumar'])->name('productos.sumar');
        Route::put('/productos/{id}/restar', [ProductosController::class, 'restar'])->name('productos.restar');

    });

    Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos');
    Route::get('/usuarios/{usuario}', [UsuariosController::class, 'index'])->name('usuarios');


});
