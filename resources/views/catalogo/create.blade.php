@extends('adminlte::page')

@section('title', 'Cadastrar Maquiagem')

@section('content_header')
    <h1>Cadastrar Nova Maquiagem</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Preencha os dados do produto</h3>
        </div>
        <form action="{{ route('catalogo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
                </div>
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required>
                </div>
                <div class="form-group">
                    <label>Categoria</label>
                    <input type="text" name="categoria" class="form-control" value="{{ old('categoria') }}" required>
                </div>
                <div class="form-group">
                    <label>Cor</label>
                    <input type="text" name="cor" class="form-control" value="{{ old('cor') }}" required>
                </div>
                <div class="form-group">
                    <label>Preço</label>
                    <input type="number" step="0.01" name="preco" class="form-control" value="{{ old('preco') }}" required>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="descricao" class="form-control" required>{{ old('descricao') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Imagem</label>
                    <input type="file" name="imagem" class="form-control-file" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Salvar Cadastro</button>
                <a href="{{ route('catalogo.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@stop