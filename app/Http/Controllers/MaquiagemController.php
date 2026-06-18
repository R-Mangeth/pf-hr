<?php

namespace App\Http\Controllers;

use App\Models\Maquiagem;
use App\Http\Requests\StoreMaquiagemRequest;

class MaquiagemController extends Controller
{
    public function store(StoreMaquiagemRequest $request)
    {
        $path = $request->file('imagem')->store('maquiagens', 'public');

        Maquiagem::create([
            'nome'      => $request->nome,
            'marca'     => $request->marca,
            'categoria' => $request->categoria,
            'cor'       => $request->cor,
            'preco'     => $request->preco,
            'descricao' => $request->descricao,
            'imagem'    => $path,
        ]);

        return redirect()->route('catalogo.index')
                         ->with('success', 'Produto cadastrado com sucesso!');
    }
}