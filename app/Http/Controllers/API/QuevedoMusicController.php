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

    public function delCanciones(Request $request){

        $request->validate([
            'name' => 'required'
        ]);
    
        $cancionName = $request->input('name');
    
        $cancion = Canciones::where('name', $cancionName)->first();
    
        if($cancion){
            $cancion->delete();
            return response()->json(['success' => 'Cancion eliminada correctamente.']);
        }else{
    
            return response()->json(['success' => 'Cancion no encontrada.']);
        }
    
    }

    public function editCanciones(Request $request){


        $request->validate([
            'last_name' => 'required',
            'name'=> 'required',
            'audio' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'id_categoria_cancion' => 'required',
        ]);
    
        $last_name = $request->input('last_name');
        $name = $request->input('name');
        $image = $request->file('audio');
        $image = $request->file('image');
        $id_categoria_cancion = $request->input('id_categoria_cancion');
    
        $cancion = Canciones::where('name', $last_name)->first();
    
        if($cancion){
            $cancion->name = $name;
            $cancion->id_categoria_cancion = $id_categoria_cancion;

            if ($image) {
                $destinationPath = 'img/Music_BadBunny/';
                $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageName);
                $cancion->image = $imageName;
            }

            if ($audio) {
                $destinationPath = 'audio/BadBunny/';
                $audioName = date('YmdHis') . "." . $audio->getClientOriginalExtension();
                $audio->move($destinationPath, $audioName);
                $cancion->audio = $audioName;
            }

            $cancion->save();
    
            return response()->json(['success' => 'Producto actualizado correctamente.']);
        }else{
    
            return response()->json(['success' => 'Producto no encontrado.']);
        }
    
    }

public function delete($id)
{
   $cancion = Canciones::find($id);
   $cancion->delete();
   unlink('/img/Music_Imagenes/'.$cancion->image);
   return response()->json(['success'=> 'Post deleted successfully']);
}


    
}
