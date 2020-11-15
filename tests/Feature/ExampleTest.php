<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login_general() //prueba para evaluar si la vista login es la correcta y si es visivble para todos
    {
        // $response = $this->get('/login');

        // $response->assertSuccessful();
        // $response->assertViewIs('auth.login');

        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_para_login_correcto() //prueba para redireccion despues de un logeo correcto
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');
    }

    public function test_para_alumnos_monitores()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/tutor/alumnosMonitores');

        $response->assertViewIs('tutor.alumnosMonitores');
    }
}
