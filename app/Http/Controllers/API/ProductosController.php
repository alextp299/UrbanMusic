<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::where('id_categoria', 2)->get();
        return response()->json($productos);
    }

    public function rosalia()
    {
        $productos = Producto::where('id_categoria', 3)->get();
        return response()->json($productos);
    }

    public function eladio()
    {
        $productos = Producto::where('id_categoria', 1)->get();
        return response()->json($productos);
    }

    public function guardarProductosSeleccionados(Request $request)
    {

       // Recibe el array de productos desde la solicitud HTTP POST
    $productos = $request->input('productos');

    // Guarda el array de productos en una sesión
    session(['productos' => $productos]);

    // Devuelve una respuesta HTTP exitosa
    return response()->json(['mensaje' => 'Productos agregados correctamente']);
    }

    public function obtenerProductos()
{
    // Obtiene el array de productos guardados en la sesión
    $productos = session('productos', []);

    // Devuelve el array de productos como una respuesta HTTP
    return response()->json($productos);
}

public function obtenerPrecioTotal()
{
    // Obtiene el array de productos guardados en la sesión
    $productos = session('productos', []);

    // Inicializa la variable de precio total
    $precioTotal = 0;

    // Recorre los productos y suma sus precios
    foreach ($productos as $producto) {
        $precioTotal += $producto['precio'];
    }

    // Devuelve el precio total como una respuesta HTTP
    return response()->json($precioTotal);
}

}
