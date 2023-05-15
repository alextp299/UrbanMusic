<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Support\Carbon;

class ProductosController extends Controller
{
    public function productos()
    {
        $productos = Producto::all()->toArray();
        return response()->json($productos);
    }

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
    // Obtiene el id del producto que se va a eliminar desde la ruta
    $id = $request->route('id');

    // Obtiene el array de productos guardados en la sesión
    $productos = session('productos');

    // Busca el índice del producto con el id dado en el array de productos
    $indice = null;
    foreach ($productos as $key => $producto) {
        if ($producto['id'] == $id) {
            $indice = $key;
            break;
        }
    }

    // Si el índice existe, elimina el producto del array
    if ($indice !== null) {
        unset($productos[$indice]);
        session(['productos' => array_values($productos)]); // Reindexa el array
    }

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

public function pedidos(Request $request){

$productos = session()->get('productos');

$ids_productos= collect($productos)->pluck('id')->toArray(); // Extraer solo los IDs de los productos

try {
    $pedido = new Pedido();
    $pedido->precio = $request->precio;
    $pedido->id_usuario = $request->id_usuario;
    $pedido->fecha = now();
    $pedido->save();
    $pedido->producto()->sync($ids_productos);
    $success = true;
    $message = "Pedido registrado correctamente";
} catch(\Illuminate\Database\QueryException $ex) {
    $success = false;
    $message = $ex->getMessage();
}

$response=[
    'success' => $success,
    'message' => $message,
];

return response()->json($response);

}

public function agregarProductos(Request $request){

    $request->validate([
        'name'=> 'required',
        'precio' => 'required',
        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'id_categoria' => 'required',
    ]);

    $input = $request->all();
    $imageName = NULL;

    if($image = $request->file('file')){
        $destinationPath = 'img/Merchandising/';
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $imageName);
        $input['image'] = $imageName;
    }

    Producto::create($input);

    return response()->json(['success' => 'Producto creado correctamente.']);

}

public function delete($id)
{
   $producto = Producto::find($id);
   $producto->delete();
   return response()->json(['success'=> 'Producto eliminado correctamente.']);
}

public function edit($id)
{
   $producto = Producto::find($id);
   return response()->json($producto);
}

public function update($id, Request $request)
{
   $producto = Producto::find($id);
   $request->validate([
       'name' => 'required',
       'precio' => 'required',
       'id_categoria' => 'required'
   ]);

   $input = $request->all();
   $imageName = NULL;

   if ($image = $request->file('file')) {
       $destinationPath = 'img/Merchandising';
       $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
       $image->move($destinationPath, $imageName);
       $input['image'] = $imageName;
       
   }

   $producto->update($input);

   return response()->json(['success'=> 'Producto actualizado correctamente']);
}

}
