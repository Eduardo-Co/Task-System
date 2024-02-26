<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AutenticacaoController extends Controller
{
    public function login(Request $request){
        return view('login');
    }

    public function login_autenticacao(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $request->validate($regras);

        $email = $request->input('usuario');
        $password = $request->input('senha');

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            session_start();
            $_SESSION['nome'] = $user->name;
            $_SESSION['email'] = $user->email;
            $_SESSION['user_id'] = $user->id;

            return redirect()->route('tarefas.consultar');
        } else {
            return redirect()->route('login')->with('erro', 'Credenciais inválidas');
        }
    }

    public function cadastro_autenticacao(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('senha'));
        $user->save();

        return view('login');
    }

    public function cadastro(Request $request)
    {
        return view('tarefas.cadastro');
    }

    public function sair(){
        session_destroy();
        return redirect()->route('login');
    }
}
