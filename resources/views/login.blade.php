@extends('layouts.basico')

@section('titulo', 'Login')

@section('conteudo')

<div class="login-container">
    <h2>Login</h2>
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf <!-- Adiciona o token CSRF -->

        <!-- Campo de usuário -->
        <div class="form-group">
            <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Email">
            @if ($errors->has('usuario'))
                <span class="error-message">{{ $errors->first('usuario') }}</span>
            @endif
        </div>

        <!-- Campo de senha -->
        <div class="form-group">
            <input name="senha" type="password" placeholder="Senha">
            @if ($errors->has('senha'))
                <span class="error-message">{{ $errors->first('senha') }}</span>
            @endif
        </div>

        <button type="submit">Entrar</button>
    </form>
    <a href="{{route('cadastro')}}">Não tem um cadastro?</a>
</div>
@endsection
