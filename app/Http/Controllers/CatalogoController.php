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
        $itens = Maquiagem::query()->orderByDesc('id')->paginate(5);
        return view('catalogo.index', compact('itens'));
    }


    public function create()
    {
        return view('catalogo.create');
    }


    public function edit(Maquiagem $catalogo)
    {
        return view('catalogo.edit', ['catalogo' => $catalogo]);
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

    public function update(Request $request, Maquiagem $catalogo)
    {
        // validações simples (sem FormRequest para não reestruturar tudo agora)
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'especificacao' => 'required|string|max:100',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $catalogo->nome = $validated['nome'];
        // seu Blade usa "especificacao" para categoria
        $catalogo->categoria = $validated['especificacao'];

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('maquiagens', 'public');
            $catalogo->imagem = $path;
        }

        $catalogo->save();

        return redirect()->route('catalogo.index')->with('success', 'Registro atualizado com sucesso!');
    }

    public function destroy(Maquiagem $catalogo)
    {
        $catalogo->delete();
        return redirect()->route('catalogo.index')->with('success', 'Registro removido com sucesso!');
    }
}

