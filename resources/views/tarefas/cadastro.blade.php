@extends('tarefas.layouts.tarefas_basico')

@section('titulo', 'cadastro')

@section('conteudo')
    
<div class="cadastro-container">
    <h2>Cadastro</h2>
    <form class="login-form" method="POST" action="{{ route('cadastro') }}">
        @csrf <!-- Adiciona o token CSRF -->

        <!-- Campo de nome -->
        <div class="form-group">
            <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome">
            @if ($errors->has('nome'))
                <span class="error-message">{{ $errors->first('nome') }}</span>
            @endif
        </div>

        <!-- Campo de email -->
        <div class="form-group">
            <input name="email" value="{{ old('email') }}" type="text" placeholder="Email">
            @if ($errors->has('email'))
                <span class="error-message">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <!-- Campo de senha -->
        <div class="form-group">
            <input name="senha" type="password" placeholder="Senha">
            @if ($errors->has('senha'))
                <span class="error-message">{{ $errors->first('senha') }}</span>
            @endif
        </div>

        <button type="submit">Cadastrar</button>
    </form>
    <a href="{{route('login')}}">Já tem um cadastro?</a>
</div> 

@endsection
