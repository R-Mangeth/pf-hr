@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ time() }}">
@endpush

@section('content')
<div class="container" style="padding-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card home-card">
                <div class="card-header home-card-header">
                    {{ __('Painel de Controle') }}
                </div>

                <div class="card-body" style="padding: 40px; color: #6e5441; text-align: center;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="border-radius: 12px; background-color: #e8f5e9; border: none; color: #2e7d32; margin-bottom: 20px;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 style="font-size: 24px; font-weight: bold; color: #4a3b32; margin-bottom: 10px;"> Olá!</h3>
                    <p style="font-size: 16px; margin-bottom: 30px; color: #9c8270;">{{ __('Você foi logado(a) com sucesso no sistema.') }}</p>

                    
                    <p class="mb-1 mt-3 text-center">
                        <a href="{{ route('catalogo.index') }}" class="link-custom">ir para o catálogo</a>
                    </p>

                    <a href="{{ route('logout') }}" 
                       class="btn btn-logout" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Sair do Sistema') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.body.classList.remove('login-page');
    });
</script>