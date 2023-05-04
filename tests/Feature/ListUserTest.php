<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory; // Importação da classe Factory
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Response;
use App\Models\User;
class ListUserTest extends TestCase
{

    public function testListUsers()
    {
        $response = $this->json('GET', '/api/usuarios');
    $response->assertStatus(Response::HTTP_OK);
    
    $users = User::all();

    if ($users->count() > 0) {
        $response->assertJsonCount($users->count(), 'data');
        $response->assertJsonStructure([
            'data' => [
                '*' => ['nome', 'email', 'cpf', 'telefone']
            ]
        ]);
    } else {
        $this->assertTrue(true);
    }
    dd($response->getcontent());
    }
    
}
