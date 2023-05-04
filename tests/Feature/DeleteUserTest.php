<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\UserController;


class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    public function testDeleteUser()
    {
        // Cria um usuário para ser deletado
        $user = User::factory()->create();

        // Chama o método DELETE da API para deletar o usuário
        $response = $this->delete('/api/usuarios/' . $user->id);

        // Verifica se a resposta da API foi 204 (no content)
        $response->assertStatus(204);

        // Tenta buscar o usuário deletado no banco de dados
        $deletedUser = User::find($user->id);

        // Verifica se o usuário não foi encontrado (deve ser null)
        $this->assertNull($deletedUser);
    }
}
