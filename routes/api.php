<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\QuevedoMusicController;
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


Route::get('Quevedo', [QuevedoMusicController::class, 'index']);

Route::get('Bad Bunny', [QuevedoMusicController::class, 'badbunny']);

Route::get('Shakira', [QuevedoMusicController::class, 'shakira']);

Route::get('Rosalia', [QuevedoMusicController::class, 'rosalia']);

Route::get('Eladio', [QuevedoMusicController::class, 'eladio']);

Route::get('Karol', [QuevedoMusicController::class, 'karol']);
    

Route::get('badbunny', [ProductosController::class, 'index']);


Route::get('rosalia', [ProductosController::class, 'rosalia']);


Route::get('eladio', [ProductosController::class, 'eladio']);

Route::get('precioTotal', [ProductosController::class, 'obtenerPrecioTotal']);

Route::delete('eliminar/{id}', [ProductosController::class, 'eliminarProductos']);

Route::get('mostrar', [ProductosController::class, 'eliminarProductos']);

Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum'], function (){
    Route::get('/', [PostController::class, 'index']);
    Route::post('add', [PostController::class, 'add']);
 });

 Route::post('guardar-productos-en-session', [\App\Http\Controllers\API\ProductosController::class, 'guardarProductosSeleccionados']);


 