@extends('layouts.catalogo')

@section('title', 'Editar Registro')

@section('content_header')
    <h1>Editar Item</h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
            Por favor, corrija os erros no formulário abaixo.
        </div>
    @endif

    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">Modifique os dados necessários</h3>
        </div>

        <form action="{{ route('catalogo.update', $catalogo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="nome">Nome / Título</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-font"></i></span>
                        </div>
                        <input
                            type="text"
                            name="nome"
                            id="nome"
                            class="form-control @error('nome') is-invalid @enderror"
                            value="{{ old('nome', $catalogo->nome) }}"
                        >

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
                        <input
                            type="text"
                            name="especificacao"
                            id="especificacao"
                            class="form-control @error('especificacao') is-invalid @enderror"
                            value="{{ old('especificacao', $catalogo->categoria) }}"
                        >

                        @error('especificacao')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="imagem">Substituir Imagem Ilustrativa</label>

                    <div class="row align-items-center mb-2">
                        <div class="col-auto">
                            <span class="text-muted d-block small mb-1">Imagem Atual:</span>

                            @if(!empty($catalogo->imagem))
                                <img
                                    src="{{ asset('storage/' . $catalogo->imagem) }}"
                                    class="img-thumbnail rounded"
                                    style="width: 80px; height: 80px; object-fit: cover;"
                                    alt="Imagem atual"
                                >
                            @else
                                <img
                                    src="https://via.placeholder.com/80"
                                    class="img-thumbnail rounded"
                                    style="width: 80px; height: 80px; object-fit: cover;"
                                    alt="Sem imagem"
                                >
                            @endif
                        </div>

                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-upload"></i></span>
                                </div>
                                <input
                                    type="file"
                                    name="imagem"
                                    id="imagem"
                                    class="form-control @error('imagem') is-invalid @enderror"
                                >

                                @error('imagem')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Envie uma imagem para atualizar.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light">
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-sync-alt"></i> Atualizar Registro
                </button>
                <a href="{{ route('catalogo.index') }}" class="btn btn-default">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

