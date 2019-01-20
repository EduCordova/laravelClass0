<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/usuarios', function(){
    // No mas $_GET  only use $id
    return "Usuarios";
});

Route::get('/usuarios/nuevo', function(){
    // No mas $_GET  only use $id
    return "Vista para crear Usuarios";
});

//PARAMETROS DINAMICO {} ADIOS ?id= :D
Route::get('/usuarios/{id}', function($id){
    //No mas $_GET  only use $id
    return "Mostrando detalle del usuario: $id";
});
// })->where('id', '[0-9]+') ;
// })->where('id', '\d+') ;

Route::get('/saludo/{id}/{name?}', function($id, $name = null){ //parametros por defecto con ?
    //No mas $_GET  only use $id
    if($name) {
        return "tu id = ".ucfirst($id)." y tu nombre es = ".ucfirst($name);
    }else {        
            return "tu nick es ".ucfirst($id);
    }
});