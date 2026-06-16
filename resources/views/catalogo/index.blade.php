@extends('adminlte::page')

@section('title', 'Painel do Catálogo')

@section('content_header')
    <h1>Nosso Catálogo</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            {{ session('success') }}
        </div>
    @endif

    <div class="card card-outline card-dark">
        <div class="card-header">
            <h3 class="card-title">Itens Cadastrados</h3>
            <div class="card-tools">
                <a href="#" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Novo Registro
                </a>
            </div>
        </div>
        
        <div class="card-body p-0">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 90px;">Imagem</th>
                        <th>Nome / Título</th>
                        <th>Especificações</th>
                        <th style="width: 150px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- O loop do banco de dados vai entrar aqui --}}
                    <tr>
                        <td>
                            <img src="https://via.placeholder.com/50" class="img-thumbnail rounded" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td><strong>Item de Exemplo</strong></td>
                        <td><span class="badge bg-primary">Geral</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-warning" title="Editar"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger" title="Excluir"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection