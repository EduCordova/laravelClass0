<?php

namespace App\Http\Controllers;
//nombres y subdirectorios

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (request()->has('empty')){
            $users=[];
        } else {
            $users = [
                'Joel',
                'edu',
                'karsa',
                'amazing',
                '<script>alert("akjdkajsda")</script>'
            ];
        }
        $title = 'Lista de Usuarios:';
    
    
        return view('user', compact('users','title'));
    }

    public function show($id)
    {
        return "Mostrando detalle del usuario: $id";
    }
    public function create()
    {
        return "Vista para crear Usuarios";
    }
    // public function withParams($id, $name = null)
    // {
    //     if($name) {
    //         return "tu id = ".ucfirst($id)." y tu nombre es = ".ucfirst($name);
    //     }else {        
    //             return "tu nick es ".ucfirst($id);
    //     }
    // }
}
