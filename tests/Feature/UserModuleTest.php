<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function test_2Example()
    {
        // $this->assertTrue(true);
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Usuarios');
    }



    function test_user_con_parametros(){
        $this->get('/usuarios/5')
            ->assertStatus(200)
            ->assertSee('Mostrando detalle del usuario: 5');
    }

    function test_route_nuevo(){
        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee('Vista para crear Usuarios');
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


}
