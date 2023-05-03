<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request){

        $credentials =[
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            $success = true;
            $message = "Usuario logeado correctamente";
        }else{
            $success = false;
            $message = "Usuario no autorizado";
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }

    public function register(Request $request){

        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->roles()->attach('3');
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

    public function logout(){

        try{
            Session::flush();

            $success = true;
            $message = "Logout correcto";
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

    public function editUser(Request $request){


        $request->validate([
            'last_name' => 'required',
            'name'=> 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $last_name = $request->input('last_name');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
    
        $user = User::where('name', $last_name)->first();
    
        if($user){
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->save();
    
            return response()->json(['success' => 'Usuario actualizado correctamente.']);
        }else{
    
            return response()->json(['success' => 'Usuario no encontrado.']);
        }
    
        
    
    }
}
