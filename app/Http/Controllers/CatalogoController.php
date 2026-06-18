<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaquiagemRequest;
use App\Models\Maquiagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogoController extends Controller
{
    public function index()
    {
        $itens = Maquiagem::query()->orderByDesc('id')->get();
        return view('catalogo.index', compact('itens'));
    }

    public function create()
    {
        return view('catalogo.create');
    }


    public function edit($id)
    {
        $catalogo = Maquiagem::findOrFail($id);
        return view('catalogo.edit', compact('catalogo'));
    }


    public function store(StoreMaquiagemRequest $request)
    {
        $path = $request->file('imagem')->store('maquiagens', 'public');

        Maquiagem::create([
            'nome'       => $request->nome,
            'marca'      => $request->marca,
            'categoria'  => $request->categoria,
            'cor'        => $request->cor,
            'preco'      => $request->preco,
            'descricao'  => $request->descricao,
            'imagem'     => $path,
        ]);

        return redirect()->route('catalogo.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }


    public function show($id){}

    public function update(Request $request, $id) {}

    public function destroy($id){}
}