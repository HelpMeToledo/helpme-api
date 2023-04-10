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
            'cpf' => 'unique:usuarios,cpf|required|max:11',
            'email' => 'unique:usuarios,email|required',
            'senha' => 'required',
            'telefone' => 'required|max:11',
        ];
    }
}
