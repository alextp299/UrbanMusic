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

    // Obtiene el array de productos guardados en la sesión
    $productosEnSesion = session('productos', []);

    // Verifica si cada producto ya se encuentra en la sesión
    foreach ($productos as $producto) {
        if (!in_array($producto, $productosEnSesion)) {
            // Si el producto no está en la sesión, lo agrega
            $productosEnSesion[] = $producto;
        }
    }

    // Guarda el array de productos actualizado en la sesión
    session(['productos' => $productosEnSesion]);

    // Devuelve una respuesta HTTP exitosa
    return response()->json(['mensaje' => 'Productos agregados correctamente']);
}

    

public function eliminarProductos(Request $request)
{
    // Obtiene el id del producto que se va a eliminar de la solicitud HTTP
    $id = $request->input('id');

    // Obtiene el array de productos guardados en la sesión
    $productos = session('productos', []);

    // Busca el índice del producto con el id dado en el array de productos
    $indice = array_search($id, array_column($productos, 'id'));

    // Si el índice existe, elimina el producto del array
    if ($indice !== false) {
        unset($productos[$indice]);
    }

    // Actualiza la sesión con el array de productos actualizado
    session(['productos' => array_values($productos)]);

    // Devuelve el array de productos actualizado como una respuesta HTTP
    return response()->json($productos);
}

public function obtenerProductos(Request $request)
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
