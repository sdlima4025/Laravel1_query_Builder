@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')
    <hr>
    <h1>Configurações</h1>
     <!-- Componentes Blade -->

        @component('components.alert')
        Testando alert com Blade sem atalho
        @endcomponent

        @alert
            Testando alert com Blade com atalho. <!-- atalho criado em AppServiceProvider.php -->
        @endalert <br><br>


     <!-- Laços de repetição -->
        Lista do Bolo:

        <ul>
            @forelse($lista as $item )
            <li>{{$item}}</li>
            @empty
                <li>Não há ingredientes</li>
            @endforelse
        </ul>

    <!-- Condicionais -->
        @if ($idade > 18 && $idade <= 60)
            Eu sou maior de idade.
        @elseif ($idade > 60 && $idade <= 120)
            Eu sou Idoso.
        @else
            Eu não sou maior de idade.
        @endif

        @isset($versao)
            Versão atual:{{$versao}}
        @endisset

        @empty($cidade)
            Digite o nome da cidade!
        @endempty
    <hr>

    <!-- Esta é a Versão:{{$versao}} -->
    <form method="POST">
        @csrf
        Nome: <br>
        <input type="text" name="nome"><br>

        Idade: <br>
        <input type="text" name="idade"> <br>

        Cidade: <br>
        <input type="text" name="cidade"> <br>

        <input type="submit" value="Enviar">
    </form>

    <a href="/config/info">Informações</a>
    <hr>
@endsection
