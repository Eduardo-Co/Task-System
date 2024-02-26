<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <base href="/">
        <link rel="stylesheet" href="/css/tarefa_estilo.css">
       
        <style>
            body{
                margin: 5px;
                background-color: rgb(133, 131, 131);
            }
        </style>
    </head>

    <body>
        @include('layouts.topo')

        @yield('conteudo')

    </body>
</html>
