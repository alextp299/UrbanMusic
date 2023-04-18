<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canciones;

class QuevedoMusicController extends Controller
{
    public function index()
    {
        $canciones = Canciones::all();
        return response()->json($canciones);
    }
}
