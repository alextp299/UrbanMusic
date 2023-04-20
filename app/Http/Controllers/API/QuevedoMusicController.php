<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canciones;

class QuevedoMusicController extends Controller
{
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
}
