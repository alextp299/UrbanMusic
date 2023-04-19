<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregarProductoEnSession(Request $request)
{
    $idProducto = $request->input('id');
    $carrito = session()->get('carrito', []);

    // Comprobar si el producto ya está en el carrito
    if (in_array($idProducto, $carrito)) {
        return response()->json(['success' => false, 'message' => 'El producto ya está en el carrito']);
    }

    // Agregar el producto al carrito
    $carrito[] = $idProducto;
    session()->put('carrito', $carrito);

    return response()->json(['success' => true, 'message' => 'Producto agregado al carrito']);
}
}
