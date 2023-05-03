<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        $response = $this->get('/api/usuarios');
        $response->assertStatus(200);
        $response->assertJsonCount(12);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'nome',
                'email',
                'email_verified_at',
                'password',
                'cpf',
                'telefone',
                'ativo',
                'remember_to',
                'created_at',
                'updated_at',
            ]
        ]);
        
    }
}
