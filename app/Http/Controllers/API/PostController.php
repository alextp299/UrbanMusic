<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    public function index(){
    $posts = Posts::all()->toArray();
    return $posts;
    }

    public function add(Request $request){

        $request->validate([
            'name'=> 'required',
            'description' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
     
        $input = $request->all();
        $imageName = NULL;
     
        if($image = $request->file('file')){
            $destinationPath = 'img/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        }
     
        Posts::create($input);
     
        return response()->json(['success' => 'Post creado correctamente.']);
     
     }
     
}
