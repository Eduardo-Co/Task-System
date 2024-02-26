@extends('tarefas.layouts.tarefas_basico')

@section('titulo', 'Principal')

@section('conteudo')

<div class="task-app">
    <div class="task-header">
        <h1>Adicionar uma tarefa</h1>
    </div>
    
    <div class="task-form">
        <form method="POST" action="{{ route('tarefas.adicionar')}}" id="taskForm">
            @csrf
            @if(isset($tarefa))
                <input type="hidden" name="id" value="{{ $tarefa->id }}">
            @endif
            <input type="text" name="tarefa" id="taskInput" placeholder="Adicione uma nova tarefa" value="{{ $tarefa->mensagem ?? old('tarefa') }}" class="borda-preta" required>
            {{ $errors->has('tarefa') ? $errors->first('tarefa') : '' }}

            <input type="datetime-local" name="prazo" id="taskInputData" value="{{ $tarefa->finalizar ?? old('prazo') }}" required>
            {{ $errors->has('prazo') ? $errors->first('prazo') : '' }}

            <button type="submit" class="borda-preta">Adicionar</button>
        </form>
    </div>
    
    <div id="centralizar">
        <p>Prazo para concluir a tarefa</p>
    </div>
</div>

@endsection
