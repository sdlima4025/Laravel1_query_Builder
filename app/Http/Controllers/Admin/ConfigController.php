<?php

namespace App\Http\Controllers\Admin; //IMPORTA O NAMESPACE OU CAMINHO OU DIRETÓRIO LINHA 8

use  App\Http\Controllers\Controller; // IMPORTANDO A CLASSE CONTROLLER
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class ConfigController extends Controller
{
    public function index(Request $request){

        $nome = 'Sérgio';
        $idade = 50;
        $cidade = $request->input('cidade'); // verificando se o input está preenchido
        $lista = [

    '3 ovos',
    '2 xícaras de chá de fubá',
    '1 xícara de chá de farinha de trigo',
    '1 1/2 xícara de chá de açúcar cristal',
    '2/3 de xícara de chá de óleo (pode ser o de canola ou de milho)',
    '2 xícaras de chá de leite',
    '1 colher de sopa de fermento em pó'

];
        $data = [
            'nome' =>$nome,
            'idade'=>$idade,
            'cidade'=>$cidade,
            'lista' => $lista
        ];

        return view('admin.config', $data);

    }

    public function info(){
        echo 'Configurações INFO 3';

    }
    public function permissoes(){
        echo 'Configurações PERMISSÕES 3';
    }
}

 /*
        $estado = $request->input('estado', 'BA');
        $nome = $request->input('nome', 'Visitante');
        $method = $request->method();

        //$dados = $request->only(['nome', 'idade']);
        $dados = $request->except(['_token']);


        print_r($dados);
       // echo "MEU NOME É : ".$nome." - ". "E O METODO DE ENVIO É: ".$method;
        return view('config');

    }
