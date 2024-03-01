

<div class="topo">
    <button class="hamburguer-button" onclick="toggleMenu()">☰</button>
    <div class="login">
    
        <a href="{{route('login')}}">Fazer login</a>
        
    </div>
    <div class="sair">
    
        <a href="{{ route('tarefas.sair') }}">Sair</a>
        
    </div>
    
    <ul>
        <li><a href="{{route('tarefas.consultar')}}">Tarefas</a></li>
        <li><a href="{{ route('tarefas.adicionar') }}"> Adicionar</a></li>
        <li><a href="{{ route('tarefas.concluidas')}}">Concluidas</a></li>
        <li><a href="">Restantes</a></li>
        <li><a href="{{route('tarefas.perdidas')}}">Perdidas</a></li>
        
    </ul>
    <script>
        function toggleMenu() {
            var menu = document.querySelector('ul');
            menu.style.display = (menu.style.display === 'flex' || menu.style.display === '') ? 'none' : 'flex';
        }
    </script>

</div>

