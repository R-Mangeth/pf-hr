@extends('layouts.catalogo')

@section('title', 'Honour')

@section('content_header')
    <h1>Gerenciar Catálogo</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-custom-rosa">
                <div class="card-header">
                    <h3 class="card-title">Itens do Catálogo</h3>
                    <div class="card-tools">
                        <a href="{{ route('catalogo.create') }}" class="btn btn-rosa">
                            <i class="fas fa-plus"></i> Novo Registro
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome do Produto</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th width="150px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($itens as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nome }}</td>
                                    <td>{{ $item->categoria }}</td>
                                    <td>R$ {{ number_format((float) $item->preco, 2, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('catalogo.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('catalogo.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja apagar este item?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Nenhum item cadastrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($itens->hasPages())
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            {{ $itens->onEachSide(1)->links() }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection