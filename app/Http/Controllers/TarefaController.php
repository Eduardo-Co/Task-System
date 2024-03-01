<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarefa;
use Carbon\Carbon;
use App\Models\TarefasPerdidas;

class TarefaController extends Controller
{
    public function adicionar(Request $request){



        return view('tarefas.adicionar');
    }
    public function adicionar_tarefa(Request $request)
    {
        $request->validate([
            'tarefa' => 'required|string',
            'prazo' => 'required|date',
        ]);
        $prazo = Carbon::parse($request->input('prazo'));

        $user_id = $_SESSION['user_id'];


        if ($request->has('id')) {
            $tarefa = Tarefa::find($request->input('id'));

            if (!$tarefa || $tarefa->user_id !== $user_id) {
                return redirect()->back()->with('error', 'Tarefa não encontrada.');
            }

            $tarefa->mensagem = $request->input('tarefa');
            $tarefa->finalizar = $request->input('prazo');
            $tarefa->save();

            return redirect()->route('tarefas.consultar')->with('success', 'Tarefa atualizada com sucesso.');
        } else {
            
            $tarefa = new Tarefa;
            $tarefa->mensagem = $request->input('tarefa');
            $tarefa->finalizar = $request->input('prazo');
            $tarefa->user_id = $user_id; // Associa a tarefa ao usuário autenticado
            $tarefa->save();

            return redirect()->route('tarefas.consultar')->with('success', 'Tarefa adicionada com sucesso.');
        }
    }

    




    public function consultar()
    {
        $user_id = $_SESSION['user_id'];
        $tarefas = Tarefa::where('user_id', $user_id)->get();

        // Adiciona uma propriedade 'prazo_passado' a cada tarefa indicando se o prazo já passou
        foreach ($tarefas as $tarefa) {
            $tarefa->prazo_passado = Carbon::now()->greaterThan(Carbon::parse($tarefa->finalizar));
        }

        return view('tarefas.consultar', ['tarefas' => $tarefas]);
    }





    public function editar($id){

        $tarefa = Tarefa::find($id);

        // Verifique se a tarefa foi encontrada
        if (!$tarefa) {
            // Lógica de tratamento se a tarefa não for encontrada (por exemplo, redirecionamento ou exibição de mensagem de erro)
            return redirect()->route('tarefas.consultar')->with('error', 'Tarefa não encontrada.');
        }


        return view('tarefas.adicionar', ['tarefa' => $tarefa]);

    }






    public function excluir($id)
    {
        $tarefa = Tarefa::find($id);

        // Verifica se a tarefa foi encontrada
        if (!$tarefa) {
            return redirect()->route('tarefas.consultar')->with('error', 'Tarefa não encontrada.');
        }

        // Exclui a tarefa
        $tarefa->delete();

        return redirect()->route('tarefas.consultar');
    }


    public function perdidas()
    {
        $user_id = $_SESSION['user_id'];
        $tarefas = Tarefa::where('user_id', $user_id)->get();

        $dataAtual = Carbon::now();
        $tarefasPerdidas = [];

        foreach ($tarefas as $tarefa) {
            if ($tarefa->finalizar !== null) {
                $dataString = trim($tarefa->finalizar); 

                $dataString = preg_replace('/\s+/', ' ', $dataString);
                
                $dataSalva = Carbon::createFromFormat('d-m-Y H:i', $dataString);

                if ($dataSalva->isPast()) {
                    $tarefaPerdida = new TarefasPerdidas;

                    $tarefaPerdida->mensagem = $tarefa->mensagem;
                    $tarefaPerdida->finalizar = $tarefa->finalizar;
                    $tarefaPerdida->user_id = $tarefa->user_id;
                    $tarefaPerdida->id  = $tarefa->id;

                    $verificarId = TarefasPerdidas::where('id', $tarefaPerdida->id)->exists();

                    if (!$verificarId) {
                        $tarefaPerdida->save();
                    }

                    $tarefasPerdidas[] = $tarefaPerdida;
                }
            }
        }

    return view('tarefas.perdidas', ['tarefasPerdidas' => $tarefasPerdidas]);
    }   

}
