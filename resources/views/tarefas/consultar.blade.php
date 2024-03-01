@extends('tarefas.layouts.tarefas_basico')

@section('titulo', 'Principal')

@section('conteudo')

<div class="task-app">
    <h1>Lista de Tarefas</h1>
    <ul class="task">
        @foreach ($tarefas as $key => $tarefa)
            <li class="task-item">

                <div class="centralizar_checkbox">
                <input type="checkbox" id="finalizada_{{ $tarefa->id }}" name="finalizada" {{ $tarefa->finalizada ? 'checked' : '' }} onchange="exibirBotaoConfirmar(this)">
               <label for="finalizada_{{ $tarefa->id }}">Finalizada</label>
                </div>

                <div class="task-content">
                    <span class="label">Tarefa {{ $key + 1 }}:</span>
                    <span class="task-message">{{ $tarefa->mensagem }}</span>
                    <span class="label">Prazo:</span>
                    <span class="task-deadline">{{ $tarefa->finalizar }}</span>
                </div>
                <div class="task-actions">
                    <button class="edit-btn" onclick="window.location.href='{{ route('tarefas.editar', ['id' => $tarefa->id]) }}'">Editar</button>
                    <button class="delete-btn" onclick="confirmarExclusao('{{ route('tarefas.excluir', ['id' => $tarefa->id]) }}')">Excluir</button>
                    <button class="confirmar-btn" onclick="window.location='{{ route('tarefas.salvarconcluidas', ['id' => $tarefa->id]) }}'" style="display: none;">Confirmar</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    function exibirBotaoConfirmar(checkbox) {
        console.log('Função exibirBotaoConfirmar foi chamada');
        var confirmarBtn = checkbox.parentElement.parentElement.querySelector('.confirmar-btn');
        if (checkbox.checked) {
            confirmarBtn.style.display = 'block';
        } else {
            confirmarBtn.style.display = 'none';
        }
    }
    function confirmarExclusao(url) {
        if (confirm('Tem certeza que deseja excluir esta tarefa?')) {
            window.location.href = url;
        }
    }
</script>

@endsection
