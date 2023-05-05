<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canciones;

class QuevedoMusicController extends Controller
{

    public function canciones()
    {
        $canciones = Canciones::all()->toArray();
        return response()->json($canciones);
    }

    public function index()
    {
        $canciones = Canciones::where('id_categoria_cancion', 1)->get();
        return response()->json($canciones);
    }

    public function badbunny()
    {
        $canciones = Canciones::where('id_categoria_cancion', 2)->get();
        return response()->json($canciones);
    }

    public function shakira()
    {
        $canciones = Canciones::where('id_categoria_cancion', 3)->get();
        return response()->json($canciones);
    }

    public function rosalia()
    {
        $canciones = Canciones::where('id_categoria_cancion', 4)->get();
        return response()->json($canciones);
    }

    public function eladio()
    {
        $canciones = Canciones::where('id_categoria_cancion', 5)->get();
        return response()->json($canciones);
    }

    public function karol()
    {
        $canciones = Canciones::where('id_categoria_cancion', 6)->get();
        return response()->json($canciones);
    }
    
    public function agregarCanciones(Request $request){

        $request->validate([
            'name'=> 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'audio' => 'required',
            'id_categoria_cancion' => 'required',
        ]);
    
        $input = $request->all();
        $imageName = NULL;
        $audioName = NULL;

    
        if($image = $request->file('file')){
            $destinationPath = 'img/Music_Imagenes/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        }

        if($audio = $request->file('audio')){
            $destinationPath = 'audio/Music/';
            $audioName = date('YmdHis') . "." . $audio->getClientOriginalExtension();
            $audio->move($destinationPath, $audioName);
            $input['audio'] = $audioName;
        }
    
        Canciones::create($input);
    
        return response()->json(['success' => 'Producto creado correctamente.']);
    
    }


public function delete($id)
{
   $cancion = Canciones::find($id);
   $cancion->delete();
   unlink('/img/Music_Imagenes/'.$cancion->image);
   return response()->json(['success'=> 'Post deleted successfully']);
}


public function edit($id)
{
   $post = Posts::find($id);
   return response()->json($post);
}




    
}
