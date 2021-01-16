<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    public function index()
    {
        //se não estiver logado redireciona para a pagina de login
        if(!$this->verificaLogin()){
            return redirect('/login');
        }

        $buscaNome   = request('buscaNome');
        $buscaStatus = request('buscaStatus');
        
        //verifica se existe o post buscaNome
        if(!empty($buscaNome)){
            $alunos = Aluno::where('nome', 'like', '%'.$buscaNome.'%')->get();
        }
         //verifica se existe o post buscaStatus
        elseif($buscaStatus != ""){
            $alunos = Aluno::where('status', $buscaStatus)->get();
        }
        else{
            $alunos = Aluno::all();
        }

        return view('home', ['alunos'=> $alunos], ['buscaNome' => $buscaNome] );
    }

    public function create()
    {
        if(!$this->verificaLogin()){
            return redirect('/login');
        }

        //retorna toda as series para usar no select
        $series = Serie::all();
    
        return view('cadastro', ['series' => $series]);
    }

    public function store(Request $request)
    {
        if(!$this->verificaLogin()){
            return redirect('/login');
        }

        //variáves com os dados do post
        $nome     = $request->nome; 
        $telefone = $request->telefone; 
        $dataNasc = $request->dataNasc; 
        $serie    = (int) $request->id_serie; 
        $status   = (int)$request->status; 
        $cep      = $request->cep; 
        $estado   = $request->estado; 
        $cidade   = $request->cidade; 

           
        //verifica se as variáveis estão vazias
        if(
            !empty($nome) && !empty($telefone) && !empty($dataNasc) &&  
            !empty($cep) && !empty($estado) && !empty($cidade)  
        )
        {
            $aluno = new Aluno;

            $aluno->nome     = $nome;
            $aluno->telefone = $telefone;
            $aluno->dataNasc = $dataNasc;
            $aluno->id_serie = $serie;
            $aluno->status   = $status;
            $aluno->cep      = $cep;
            $aluno->estado   = $estado;
            $aluno->cidade   = $cidade;

            $aluno->save();
            
            return redirect('/cadastro')->with('msg-sucesso', 'Aluno cadastrado com sucesso!');
        }else{
            return redirect('/cadastro?erro')->with('msg-erro', 'Por favor! Preencha todos os campos.');
        }
    }

    public function show($id)
    {
        if(!$this->verificaLogin()){
            return redirect('/login');
        }

        $aluno = DB::table('alunos')
                    ->join('series', 'series.id', '=', 'alunos.id_serie')
                    ->where('alunos.id', '=', $id)->first();
                     
        return view('info', ['aluno' => $aluno]);
    }

    public function edit($id)
    {
        if(!$this->verificaLogin()){
            return redirect('/login');
        }

        $aluno = Aluno::findOrFail($id);
        $series = Serie::all();
       
        return view('editar', ['aluno' => $aluno], ['series' => $series]);
    }

    public function update(Request $request, $id)
    {
        if(!$this->verificaLogin()){
            return redirect('/login');
        }

        $nome     = $request->nome;
        $telefone = $request->telefone;
        $dataNasc = $request->dataNasc;
        $serie    = $request->serie;
        $status   = $request->status;
        $cep      = $request->cep;
        $estado   = $request->estado;
        $cidade   = $request->cidade;

        //verifica se está vazio
        if(
            !empty($nome) && !empty($telefone) && !empty($dataNasc) && 
            !empty($serie) && !empty($cep) && !empty($estado) && !empty($cidade)
            
        ){
            $aluno = Aluno::find($id);

            $aluno->nome     = $nome;
            $aluno->telefone = $telefone;
            $aluno->dataNasc = $dataNasc;
            $aluno->id_serie = $serie;
            $aluno->status   = $status;
            $aluno->cep      = $cep;
            $aluno->estado   = $estado;
            $aluno->cidade   = $cidade;

            $aluno->save();
            
            return redirect('/')->with('msg-sucesso', 'Aluno alterado com sucesso!');
        }else{
            return redirect('/')->with('msg-erro', 'Por favor! Preencha todos os campos.');
        }
    }

    public function destroy($id)
    {
        if(!$this->verificaLogin()){
            return redirect('/login');
        }

        $aluno = Aluno::find($id);
        $aluno->delete();

        return redirect('/');
    }

    public function verificaLogin()
    {
        session_start();
        if(!isset($_SESSION['id'] ) && !isset($_SESSION['nome'])){
           return false;
        }else{
            return true;
        }
    }
}
