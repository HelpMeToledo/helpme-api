<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;
use App\Models\User;

class CreateUserTest extends TestCase
{
    use WithFaker;

    public function testCreateUser()
    {
        $data = [
            'nome' => 'felipe7777',
            'email' => 'felipe@loko3.com',
            'password' => '5599',
            'cpf' => '12345678901',
            'telefone' => '11987654321'
        ];

        $response = $this->json('POST', '/api/usuarios', $data);
        $response->assertStatus(Response::HTTP_OK);

        $user = User::where('email', 'felipe@loko3.com')->firstOrFail();

        $this->assertEquals('felipe7777', $user->nome);
        $this->assertEquals('felipe@loko3.com', $user->email);
        $this->assertTrue(password_verify('5599', $user->password));
        $this->assertEquals('12345678901', $user->cpf);
        $this->assertEquals('11987654321', $user->telefone);
    }
}
