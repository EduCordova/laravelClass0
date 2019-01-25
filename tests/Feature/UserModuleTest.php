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
      //  $this->withoutExceptionHandling();
        //enviando petision type POST
        $this->post('/usuarios/', [
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

    function test_name_is_required(){
       // $this->withoutExceptionHandling();

        $this->from('usuarios/nuevo')
        ->post('/usuarios/',[
            'name' => '',
            'email' => 'doocv@gmail.com',
            'password' => 'espada001'
        ])->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['name' => 'El campo nombre es Obligatorio']);

            $this->assertEquals(0, User::count());
        // $this->assertDatabaseMissing('users', [
        //     'email' => 'doocv@gmail.com',
        // ]);
    }

    function test_email_unique() {
        //fabrica
        factory(User::class)->create([
            'email' => 'educord@gmail.com'
        ]);


        $this->from('usuarios/nuevo')
        ->post('/usuarios/',[
            'name' => 'eduj',
            'email' => 'educord@gmail.com',
            'password' => 'espada001'
        ])->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email' => 'El email ya existe']);

            $this->assertEquals(1, User::count());
    }

    function test_edit_one_user() {
        //Creamos un usuario
        $user = factory(User::class)->create();

        $this->get("usuarios/{$user->id}/editar") // usuarios/3/editar
            ->assertStatus(200)
            ->assertSee($user->name)
            ->assertSee($user->email)
            ->assertViewIs('users.edit')
            ->assertViewHas('user', $user);
    }
}
