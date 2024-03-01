@extends('tarefas.layouts.tarefas_basico')

@section('titulo', 'Principal')

@section('conteudo')

<div class="task-app">
    <h1>Lista de Tarefas</h1>
    <ul class="task">
        @foreach ($tarefas as $key => $tarefa)
            <li class="task-item">
                <div class="task-content">
                    <span class="label">Tarefa {{ $key + 1 }}:</span>
                    <span class="task-message">{{ $tarefa->mensagem }}</span>
                    <span class="label">Prazo:</span>
                    <span class="task-deadline">{{ $tarefa->finalizar }}</span>
                </div>
                <div class="task-actions">
                    <button class="edit-btn" onclick="window.location.href='{{ route('tarefas.editar', ['id' => $tarefa->id]) }}'">Editar</button>

                   
                    <button class="delete-btn" onclick="confirmarExclusao('{{ route('tarefas.excluir', ['id' => $tarefa->id]) }}')">Excluir</button>

                </div>
            </li>
        @endforeach
    </ul>
</div>


<script>
    function confirmarExclusao(url) {
        if (confirm('Tem certeza que deseja excluir esta tarefa?')) {
            window.location.href = url;
        }
    }
</script>

@endsection
