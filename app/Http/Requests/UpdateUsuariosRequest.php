<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [   
            'nome' => 'required',          
            'cpf' => 'required|size:11',
            'email' => 'required|email|unique: users.email'.$this->id(),
            'senha' => 'required|min:3',
            'telefone' => 'required|size:11',
        ];
    }
    public function messages(): array
    {
    return [
        'nome.required' => 'O campo nome é obrigatório.',
        'email.required' => 'O campo e-mail é obrigatório.',
        'email.email' => 'Por favor, informe um endereço de e-mail válido.',
        'email.unique' => 'O endereço de e-mail informado já está sendo utilizado por outra pessoa!',
        'senha.required' => 'O campo senha é obrigatório.',
        'senha.min' => 'A senha deve conter pelo menos 3 caracteres.',
        'telefone.required' => 'O campo de telefone é obrigatório.',
        'telefone.size' =>'O telefone deve ter 11 números. Use seu DDD!'
    ];
  }
}
