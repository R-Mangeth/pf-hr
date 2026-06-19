<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaquiagemRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nome'      => 'required|string|max:255',
            'marca'     => 'required|string|max:100',
            'categoria' => 'required|string|max:100',
            'cor'       => 'required|string|max:50',
            'preco'     => 'required|numeric|min:0',
            'descricao' => 'required|string',
            'imagem'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}