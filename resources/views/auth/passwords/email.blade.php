@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Redefinir Senha</p>

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar Link de Redefinição</button>
            </form>
        </div>
    </div>
</div>
@endsection