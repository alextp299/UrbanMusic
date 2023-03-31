<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        return "Hola login";
    }

    public function register(Request $request){
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
   
            $success = true;
            $message = "Usuario registrado correctamente";
        }catch(\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }
       


        $response=[
            'success' => $success,
            'message' => $message,
        ];

        return response()->json($response);
    }

    public function logout(Request $request){
        return "Hola logout";
    }
}
