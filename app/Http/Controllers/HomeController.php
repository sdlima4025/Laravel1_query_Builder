<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class HomeController extends Controller
{
    public function __invoke() {
        //EDITANDO
        /*$t = Tarefa::find(18);
        $t->titulo = 'Estudante Serginho';
        $t->save();

         // DELETANDO
         $t = Tarefa::find(18);
         $t->delete();

        // INSSERINDO
       /*$t = new Tarefa;
       $t->titulo = 'Inserindo com Eloquent';
       $t->save();*/

       echo "Salvo com Sucesso!";


       // return view('welcome');
    }
}
