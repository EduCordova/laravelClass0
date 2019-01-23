<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUser extends Controller
{
    public function __invoke($id, $name = null)
    {
        if($name) {
            return "tu id = ".ucfirst($id)." y tu nombre es = ".ucfirst($name);
        }else {        
                return "tu nick es ".ucfirst($id);
        }
    }
}
