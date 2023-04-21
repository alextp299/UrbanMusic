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
    public function guardarProductosSeleccionados(Request $request)
    {

        // Obtener el array de productos desde la petición
        $carrito = $request->input('productos');

        // Guardar el array en la sesión
        $request->session()->put('productos_seleccionados', $carrito);

        return response()->json($carrito);
    }
}
