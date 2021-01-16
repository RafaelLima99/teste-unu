<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\UsuarioController;

//rota que utiliza o controller AlunoController
Route::get('/', [AlunoController::class, 'index']);
Route::get('/cadastro', [AlunoController::class, 'create']);
Route::post('aluno/insert', [AlunoController::class, 'store']);
Route::get('aluno/{id}', [AlunoController::class, 'show']);
Route::get('aluno/editar/{id}', [AlunoController::class, 'edit']);
Route::post('aluno/editar/update/{id}', [AlunoController::class, 'update']);
// Route::post('usuario/insert', [AlunoController::class, 'store']);
Route::get('aluno/delete/{id}', [AlunoController::class, 'destroy']);

//rotas que utiliza o controller UsuarioController
Route::get('/login', [UsuarioController::class, 'index']);
Route::post('/auth', [UsuarioController::class, 'auth']);
Route::get('/criar-conta', [UsuarioController::class, 'create']);
Route::post('/usuario-insert', [UsuarioController::class, 'store']); 
Route::get('/sair', [UsuarioController::class, 'sair']);