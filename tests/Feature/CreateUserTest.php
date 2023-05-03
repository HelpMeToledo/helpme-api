<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;
use App\Http\Controllers\UserController; 

class CreateUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testStore()
    {
        // Cria um modelo fake para usar nos testes
        $data = User::factory()->make();

        $data = [
            'nome' => "felipe silveira",
            'telefone' => "18981317010",
            'cpf' => "00452188202",
            'email' => "felipe@example.com",
            'password' => "5599", 
        ];

        // Simula a requisição de store com os dados do modelo
        $response = $this->post(route('usuarios.store'), $data);

        
        $response->assertSuccessful();

        // Verifica se o modelo foi criado no banco de dados
        $this->assertDatabaseHas('users', $data);

        dd($response->getContent());

    }
}
