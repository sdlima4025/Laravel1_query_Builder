<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB; // Usando QueryBuilder
use App\Tarefa;

class TarefasController extends Controller
{

    public function list(){

        //$list = DB::select('SELECT * FROM tarefas'); QueryBuilder

        $list = Tarefa::all();// Eloquent ORM

        return view('tarefas.list',[
            'list' => $list
        ]);

    }
    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
            $request->validate([
                'titulo' => ['required', 'string']
            ]);


            $titulo = $request->input('titulo');
                // QueryBuilder
            /*DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
                'titulo'=>$titulo
            ]);*/

            //Eloquent ORM
            $t = new Tarefa;
            $t->titulo = $titulo;
            $t->save();

            return redirect()->route('tarefas.list');


    }
    public function edit($id){
            // QueryBuilder
        /*$data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
            'id'=> $id
        ]);*/

            //Eloquent ORM
        $data = Tarefa::find($id);

        if($data) {
            return view('tarefas.edit', [
                'data' => $data
            ]);
        }else {
            return redirect()->route('tarefas.list');
        }


    }
    public function editAction(Request $request, $id){
        $request->validate([
            'titulo' => ['required', 'string']
        ]);

            $titulo = $request->input('titulo');
                    // QueryBuilder
                /*DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
                    'id' => $id,
                    'titulo' => $titulo
                ]);*/

                    //Eloquent ORM
                $t = Tarefa::find($id);
                $t->titulo = $titulo;
                $t->save();

            return redirect()->route('tarefas.list');

    }
    public function del($id){
             // QueryBuilder
        /*DB::delete('DELETE FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);*/

             //Eloquent ORM
        Tarefa::find($id)->delete();

        return redirect()->route('tarefas.list');
    }
    public function done($id){
              // QueryBuilder
        /*DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
                'id' => $id
            ]);*/

                //Eloquent ORM ?
            $t = Tarefa::find($id);
            if($t){
                $t->resolvido = 1 - $t->resolvido;
                $t->save();
            }


        return redirect()->route('tarefas.list');
    }
}
