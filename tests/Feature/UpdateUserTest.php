<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Response;
use Tests\TestCase;
use App\Models\User;

class UpdateUserTest extends TestCase
{
    //use RefreshDatabase;
    public function testUpdateUser()
    {
        $user = User::create([
            'nome' => 'joao gomes',
            'email' => 'joao@test.com',
            'password' => '5599',
            'cpf' => '12345678901',
            'telefone' => '11987654321'
        ]);


        $data = [
            'nome' => 'joaogomes',
            'email' => 'joao@teste11.com',
            'password' =>'559900',
            'cpf' => '10987654371',
            'telefone' => '11999999999'
        ];
    
        $response = $this->json('PUT', '/api/usuarios/' . $user->id, $data);
        dd($response->getcontent());

        $response->assertStatus(Response::HTTP_OK);
    
        $user = User::find($user->id);
    
        $this->assertEquals('joaogomes', $user->nome);
        $this->assertEquals('joao@teste11.com', $user->email);
        $this->assertTrue(password_verify('559900', $user->password));
        $this->assertEquals('10987654371', $user->cpf);
        $this->assertEquals('11999999999', $user->telefone);
        

    }
}

