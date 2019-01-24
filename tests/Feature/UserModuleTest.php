<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @test
     */
    public function test_usuarios()
    {
        factory(User::class)->create([
            "name" => 'eduju'
        ]);
        factory(User::class)->create([
            "name" => 'felipe'
        ]);
        // $this->assertTrue(true);
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de Usuarios')
            ->assertSee('eduju')
            ->assertSee('felipe');
    }


    public function test_view_vacia()
    {
        // $this->assertTrue(true);
        // DB::table('users')->truncate();
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de Usuarios')
            ->assertSee('No hay usuarios registrados');
    }



    function test_user_con_parametros(){

        $user = factory(User::class)->create([
            'name' => 'eduardo kordouba'
        ]);

        $this->get('/usuarios/'.$user->id)
            ->assertStatus(200)
            ->assertSee($user->name);
    }

    function test_user_con_parametros_null(){

        $this->get('/usuarios/500')
            ->assertStatus(404)
            ->assertSee('Pagina no encontrada');
    }



    function test_route_nuevo(){
        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee('Crear Usuario');
    }

    function test_multi_params(){
        $this->get('/saludo/doo/eduardo')
            ->assertStatus(200)
            ->assertSee('tu id = Doo y tu nombre es = Eduardo');
    }

    function test_one_param(){
        $this->get('/saludo/doo')
            ->assertStatus(200)
            ->assertSee('tu nick es Doo');
    }


    function test_create_users()
    {
        $this->withoutExceptionHandling();
        //enviando petision type POST
        $this->post('/usuarios', [
            'name' => 'edu',
            'email' => 'doocv@gmail.com',
            'password' => 'espada001',
        ])->assertRedirect('usuarios');

        $this->assertCredentials([
            'name' => 'edu',
            'email' => 'doocv@gmail.com',
            'password' => 'espada001',
        ]);
    }
}
