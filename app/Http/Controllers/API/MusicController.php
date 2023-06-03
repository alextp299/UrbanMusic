<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canciones;
use App\Models\Categoria_Canciones;

class MusicController extends Controller
{

    public function canciones()
{
    $user = auth()->user();
    foreach ($user->roles as $role) {
        if ($role->rol === 'accederAdmin') {
            $canciones = Canciones::all()->toArray();
            return response()->json($canciones);
        }
    }

    return response()->json(['error' => 'No tienes permiso para ver las canciones'], 403);
}

    
    public function canciones_categoria()
    {
        $canciones_categoria = Categoria_Canciones::all()->toArray();
        return response()->json($canciones_categoria);
    }

    public function getCancionesCategoria($id_categoria)
    {
        $canciones = Canciones::where('id_categoria_cancion', $id_categoria)->get();
        return response()->json($canciones);
    }
    
    public function agregarCanciones(Request $request)
{
    $request->validate([
        'name'=> 'required',
        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'audio' => 'required',
        'id_categoria_cancion' => 'required',
    ]);

    $user = auth()->user();

    foreach ($user->roles as $role) {
        if ($role->rol === 'añadir') {
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

            return response()->json(['success' => 'Canción creada correctamente']);
        }
    }

    return response()->json(['error' => 'No tienes permiso para agregar canciones'], 403);
}


    public function delete($id)
    {
        $user = auth()->user();

        foreach ($user->roles as $role) {
            if ($role->rol === 'eliminar') {
                $cancion = Canciones::find($id);

                if ($cancion) {
                    $cancion->delete();
                    return response()->json(['success' => 'Canción eliminada correctamente']);
                }
            }
        }

        return response()->json(['error' => 'No tienes permiso para eliminar la canción'], 403);
    }

    public function edit($id)
    {
        $cancion = Canciones::find($id);
        
        $user = auth()->user();
        foreach ($user->roles as $role) {
            if ($role->rol === 'editar') {
                return response()->json($cancion);
            }
        }
    
        return response()->json(['error' => 'No tienes permiso para editar la canción'], 403);
    }
    
    public function update($id, Request $request)
    {
        $cancion = Canciones::find($id);
        
        $user = auth()->user();
        foreach ($user->roles as $role) {
            if ($role->rol === 'editar') {
                $request->validate([
                    'name' => 'required',
                    'id_categoria_cancion' => 'required'
                ]);
    
                $input = $request->all();
                $imageName = NULL;
                $audioName = NULL;
    
                if ($image = $request->file('file')) {
                    $destinationPath = 'img/Music_Imagenes';
                    $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $imageName);
                    $input['image'] = $imageName;
                }
    
                if ($audio = $request->file('audio')) {
                    $destinationPath = 'audio/Music';
                    $audioName = date('YmdHis') . "." . $audio->getClientOriginalExtension();
                    $audio->move($destinationPath, $audioName);
                    $input['audio'] = $audioName;
                }
    
                $cancion->update($input);
    
                return response()->json(['success'=> 'Canción actualizada correctamente']);
            }
        }
    
        return response()->json(['error' => 'No tienes permiso para editar la canción'], 403);
    }
    
}
