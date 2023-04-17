<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canciones;

class QuevedoMusicController extends Controller
{
    public function index($categoria)
{
    $canciones = Cancion::where('categoria', $categoria)->get();
    return response()->json($canciones);
}
}
