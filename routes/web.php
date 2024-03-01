<?php

use App\Http\Controllers\ProcurarusuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\TarefaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AutenticacaoController::class, 'login'])->name('login');
Route::post('/', [AutenticacaoController::class, 'login_autenticacao'])->name('login');
Route::get('/cadastro', [AutenticacaoController::class, 'cadastro'])->name('cadastro');
Route::post('/cadastro', [AutenticacaoController::class, 'cadastro_autenticacao'])->name('cadastro');

Route::middleware(['autenticacao'])->prefix('tarefas')->group(function () {
    Route::get('/consultar', [TarefaController::class, 'consultar'])->name('tarefas.consultar');
    Route::get('/sair', [AutenticacaoController::class, 'sair'])->name('tarefas.sair');
    Route::get('/adicionar', [TarefaController::class, 'adicionar'])->name('tarefas.adicionar');
    Route::post('/adicionar', [TarefaController::class, 'adicionar_tarefa'])->name('tarefas.adicionar');
    Route::get('/restantes', [TarefaController::class, 'restantes'])->name('tarefas.restantes');
    Route::get('/perdidas', [TarefaController::class, 'perdidas'])->name('tarefas.perdidas');
    Route::get('/salvarconcluidas/{id?}', [TarefaController::class, 'salvarconcluidas'])->name('tarefas.salvarconcluidas');
    Route::get('/Concluidas', [TarefaController::class, 'concluidas'])->name('tarefas.concluidas');
    Route::get('/editar/{id}', [TarefaController::class, 'editar'])->name('tarefas.editar');
    Route::get('/excluir/{id}', [TarefaController::class, 'excluir'])->name('tarefas.excluir');
    Route::get('/procurarusuario', [ProcurarusuarioController::class, 'procurar'])->name('tarefas.procurar');
});



