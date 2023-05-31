<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\MusicController;
use App\Http\Controllers\API\ProductosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);
Route::post('logout',[UserController::class,'logout'])->middleware(['auth:sanctum']);

Route::post('pedidos',[ProductosController::class,'pedidos']);

Route::get('canciones_categoria', [MusicController::class, 'canciones_categoria']);

Route::get('/canciones_categoria/{id_categoria}', [MusicController::class, 'getCancionesCategoria']);

Route::get('productos_categoria', [ProductosController::class, 'productos_categoria']);

Route::get('/productos_categoria/{id_categoria}', [ProductosController::class, 'getProductosCategoria']);

Route::get('carrito', [ProductosController::class, 'obtenerProductos']);

Route::get('precioTotal', [ProductosController::class, 'obtenerPrecioTotal']);

Route::post('guardar-productos-en-session', [\App\Http\Controllers\API\ProductosController::class, 'guardarProductosSeleccionados']);

Route::post('addProducto', [ProductosController::class, 'agregarProductos']);

Route::post('addCanciones', [MusicController::class, 'agregarCanciones']);

Route::delete('eliminar/{id}', [ProductosController::class,'eliminarProductos']);

Route::delete('deleteProducto/{id}', [ProductosController::class,'delete']);

Route::post('updateProducto/{id}', [ProductosController::class,'update']);

Route::get('editProducto/{id}', [ProductosController::class,'edit']);

Route::delete('delete/{id}', [MusicController::class,'delete']);
 
Route::post('updateUsuario/{id}', [UserController::class,'update']);

Route::delete('deleteUsuario/{id}', [UserController::class,'delete']);

Route::post('update/{id}', [MusicController::class,'update']);

Route::get('edit/{id}', [MusicController::class,'edit']);

Route::get('usuariosAdmin', [UserController::class,'usuarios']);

Route::delete('deleteUsuarioAdmin/{id}', [UserController::class,'deleteUsuarioAdmin']);

Route::post('addUsuarioAdmin', [UserController::class, 'agregarUsuariosAdmin']);

Route::post('updateUserAdmin/{id}', [UserController::class, 'editarUsuariosAdmin']);

Route::get('editUser/{id}', [UserController::class, 'editUserAdmin']);

Route::get('roles', [UserController::class, 'getRoles']);
 