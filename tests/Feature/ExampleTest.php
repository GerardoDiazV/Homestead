<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test  */
    public function loads_menu()
    {
        $response = $this->get('/menu');
        $response->assertStatus(200);
        $response->assertSee('Hola mundo');
    }
}
