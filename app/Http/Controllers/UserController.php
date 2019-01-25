<?php

namespace App\Http\Controllers;
//nombres y subdirectorios

use Illuminate\Http\Request;
//IMportando db
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        // if (request()->has('empty')){
        //     $users=[];
        // } else {
        //     $users = [
        //         'Joel',
        //         'edu',
        //         'karsa',
        //         'amazing',
        //         '<script>alert("akjdkajsda")</script>'
        //     ];
        // }
        // $title = 'Lista de Usuarios:';


        // return view('user', compact('users','title'));
        // $users = DB::table('users')->get(); //Basic
        // with eloquent
        $users = User::all();
        $title = "Listado de Usuarios";
        return view('users.index', compact('title','users'));
    }

    public function show($id) //User $user
    {
        // $user = User::findOrFail($id);
        $user = User::find($id);
        if($user == null) {
            // return view('error.404');
            return response()->view('error.404',[], 404);
        }
        return view('users.show' , compact('user'));
    }
    public function create()
    {
        return view('users.create');
    }
    // public function withParams($id, $name = null)
    // {
    //     if($name) {
    //         return "tu id = ".ucfirst($id)." y tu nombre es = ".ucfirst($name);
    //     }else {
    //             return "tu nick es ".ucfirst($id);
    //     }
    // }

    public function store()
    {
        //recibir datos de un post
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required','email', 'unique:users,email'],
            'password' => 'required'
        ],[
            'name.required' => 'El campo nombre es Obligatorio',
            'email.required' => 'El campo email es Obligatorio',
            'email.email' => 'Ingresa un email Valido',
            'email.unique' => 'El email ya existe',
            'password.required' => 'El campo password es Obligatorio',
        ]);

        // if(empty($data['name'])){
        //     //redireccionamos
        //     return redirect('usuarios/nuevo')->withErrors([
        //         'name' => 'Es obligatorio'
        //     ]);
        // }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
            return redirect()->route('users');
    }

    public function edit(User $user)
    {
        // $user = User::find($id);
        return view('users.edit', compact('user')); //Nombre de la Ubicacion de la vista (Carpetas)
    }
}
