<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
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
            $user->roles()->attach('1');
            $success = true;
            $message = "Usuario registrado correctamente";
        }catch(\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = "Usuario ya existente";
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

    public function delete($id)
    {
       $user = User::find($id);
       
       $user->delete();
       
       return response()->json(['success'=> 'Usuario eliminado correctamente']);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }


    public function update($id, Request $request){

        $user = User::find($id);
        $request->validate([
            'name'=> 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        
        $user->update($input);

        return response()->json(['success'=> 'Usuario actualizado correctamente']);
    
    }

    public function usuarios()
{
    $user = auth()->user();
    foreach ($user->roles as $role) {
        if ($role->rol === 'accederUserAdmin') {
            $usuarios = User::with('roles')->get();
            return response()->json($usuarios);
        }
    }

    return response()->json(['error' => 'No tienes permiso para ver los usuarios'], 403);
}

public function deleteUsuarioAdmin($id)
{
    $user = User::find($id);

    $currentUser = auth()->user();
    foreach ($currentUser->roles as $role) {
        if ($role->rol === 'eliminar') {
            $user->delete();
            return response()->json(['success'=> 'Usuario eliminado correctamente']);
        }
    }

    return response()->json(['error' => 'No tienes permiso para eliminar el usuario'], 403);
}

public function agregarUsuariosAdmin(Request $request)
{
    $currentUser = auth()->user();
    foreach ($currentUser->roles as $role) {
        if ($role->rol === 'añadir') {
            try {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                $user->roles()->attach('1');
                $roles = $request->input('roles', []);
                $user->roles()->attach($roles);
                $success = true;
                $message = "Usuario registrado correctamente";
            } catch (\Illuminate\Database\QueryException $ex) {
                $success = false;
                $message = "Usuario ya existente";
            }

            return response()->json(['success' => 'Usuario añadido correctamente']);
        }
    }

    return response()->json(['error' => 'No tienes permiso para agregar usuarios'], 403);
}

public function editarUsuariosAdmin($id, Request $request)
{
    $user = User::find($id);

    $currentUser = auth()->user();
    foreach ($currentUser->roles as $role) {
        if ($role->rol === 'editar') {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user->update($input);

            $user->roles()->sync($request->roles);
            $user->roles()->attach('1');

            return response()->json(['success' => 'Usuario actualizado correctamente']);
        }
    }

    return response()->json(['error' => 'No tienes permiso para editar el usuario'], 403);
}

public function editUserAdmin($id)
{
    $user = User::find($id);

    $currentUser = auth()->user();
    foreach ($currentUser->roles as $role) {
        if ($role->rol === 'editar') {
            return response()->json($user);
        }
    }

    return response()->json(['error' => 'No tienes permiso para editar el usuario'], 403);
}


    public function getRoles()
    {
        $roles = Roles::where('rol', '!=', 'normal')->get();
        return response()->json($roles);
    }

    

}