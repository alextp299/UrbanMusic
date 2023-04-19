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
        // Obtener el array de productos seleccionados del request
        $productosSeleccionados = $request->input('productos_seleccionados');

        // Guardar el array en la sesión
        session(['productos_seleccionados' => $productosSeleccionados]);
        
        return $request;
    }
}
