<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tests\TestCase;
use App\Models\User;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;
    public function testUpdateUser()
    {
        $user = User::factory()->create();
        
        $response = $this->put('/api/usuarios/' . $user->id, [
            "nome" => "Joao",
            "email" => "joao@teste.com",
            "cpf" => "11111111111",
            "telefone" => "12345678910",
            "ativo" => 1
        ]);
    
        $response->assertStatus(200);
        
        $updatedUser = User::find($user->id);
        $this->assertEquals('Joao', $updatedUser->nome);
        $this->assertEquals('joao@teste.com', $updatedUser->email);
        $this->assertEquals('11111111111', $updatedUser->cpf);
    }
}

