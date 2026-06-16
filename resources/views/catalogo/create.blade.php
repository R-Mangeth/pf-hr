@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Novo Item</h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
            Por favor, corrija os erros no formulário abaixo.
        </div>
    @endif

    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Preencha os dados do registro</h3>
        </div>
        
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="card-body">
                
                <div class="form-group mb-3">
                    <label for="nome">Nome / Título</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-font"></i></span>
                        </div>
                        <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" placeholder="Ex: Nome do item...">
                        
                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="especificacao">Especificação / Categoria</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                        </div>
                        <input type="text" name="especificacao" id="especificacao" class="form-control @error('especificacao') is-invalid @enderror" value="{{ old('especificacao') }}" placeholder="Ex: Categoria ou detalhe...">
                        
                        @error('especificacao')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="imagem">Imagem Ilustrativa</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                        </div>
                        <input type="file" name="imagem" id="imagem" class="form-control @error('imagem') is-invalid @enderror">
                        
                        @error('imagem')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <small class="form-text text-muted">Formatos permitidos: JPG, JPEG, PNG. Tamanho máximo: 2MB.</small>
                </div>

            </div>

            <div class="card-footer bg-light">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Salvar Registro
                </button>
                <a href="#" class="btn btn-default">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection