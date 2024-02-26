<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('/css/estilo_basico.css') }}">
       
        
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
