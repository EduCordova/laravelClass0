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
        $data = request()->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        // return redirect('usuarios');
        return redirect()->route('users');
    }
}
