<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Tarefa;

use Illuminate\Support\Facades\Validator;

class TarefasController extends Controller
{
    public function getTasks(){

    $array = ['error'=>'', 'success'=>''];
       $list = Tarefa::select()->get();

       return $list;

    }

    public function addTasks(Request $request){
        $title = $request->title;
        $body = $request->body;
        $bgColor = $request->bgColor;

        
        if($title && $body && $bgColor){

            $list = new Tarefa();
            $list->title = $title;
            $list->body = $body;
            $list->bgColor = $bgColor;
            $list->save();

            return $array['success'] = 'Tarefa adicionando com sucesso!';

        }
        return null;
        
    }

    public function updateTasks($id, Request $request){
       
        $array = ['error'=>'', 'success'=>''];
            
            $validator = $request->validate([
                'title' => 'required|min:3',
                'body' => 'required',
                'bgColor'=>'string',
            ]);

       

            $title = $request->input('title');
            $body = $request->input('body');
            $bgColor = $request->input('bgColor');
            
            $tarefas = Tarefa::find($id);

            
            if($tarefas){
                    Tarefa::where('id', $id)->update([
                        'title'=> $title,
                        'body'=> $body,
                        'bgColor' => $bgColor
                    ]);
                    

                    $array['success'] = 'Tarefas atualizadas com sucesso';
                    return $array;
                
            }else{
                $arrey['error'] = 'A tarefas com '.$id.' não existe';
                return $array;
            }

        return $array;


    }

    public function delTasks($id){
        $array = ['error'=>'', 'success'=>''];

            if($id){
                Tarefa::where('id', $id)->delete();
                $array['success'] = 'Tarefas deletada com sucesso!';
                return $array;
            }

        return $array;
    }
}


