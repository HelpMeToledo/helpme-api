<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChamadoRequest extends FormRequest
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
            "anexo" => "required",
            "ativo" => "required",
            "descricao" => "required",
            "idDepartamento" => "required",
            "idStatus" => "required",
            "titulo" => "required"
        ];
    }

    public function messages(): array
    {
        return [
            'anexo.required' => 'O campo anexo é obrigatório.',
            'ativo.required' => 'O campo ativo é obrigatório.',
            'descricao.required' => 'O campo descricao é obrigatório.',
            'idDepartamento.required' => 'O campo idDepartamento é obrigatório.',
            'idStatus.required' => 'O campo idStatus é obrigatório.',
            'titulo.required' => 'O campo titulo é obrigatório.'
        ];
    }
}
