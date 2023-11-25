<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:50',
            'descricao' => 'nullable|string|max:250',
            'preco_un' => 'required|numeric|min:0.01',
            'quantidade_est' => 'required|numeric|min:0|max:1000',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'preco_un.required' => 'O preço unitário é obrigatório.',
            'preco_un.numeric' => 'O preço unitário deve ser um número.',
            'preco_un.min' => 'O preço unitário deve ser maior ou igual a zero.',
            'quantidade_est.required' => 'A quantidade em estoque é obrigatória.',
            'quantidade_est.integer' => 'A quantidade em estoque deve ser um número inteiro.',
            'quantidade_est.min' => 'A quantidade em estoque deve ser maior ou igual a zero.',
            'quantidade_est.max' => 'A quantidade em estoque deve ser no máximo 1000.',
        ];
    }
}
