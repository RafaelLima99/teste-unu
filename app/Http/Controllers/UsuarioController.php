<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function create()
    {
        return view('criar-conta');
    }

    public function store(Request $request)
    {
        $nome     = $request->nome;
        $username = $request->username;
        $email    = $request->email;
        $senha    = $request->senha;

        if(!empty($nome) && !empty($username) && !empty($email) && !empty($senha)){
            
            //verifica se o email e username existe no banco
            //as variaveis armazena um valor boolean
            $emailCount    = Usuario::where('email', $email)->count();
            $usernameCount = Usuario::where('username', $username)->count();
            
            //se o email n existir no banco
            if(!$emailCount){

                //se o username não existir no banco
                if(!$usernameCount){

                    $usuario = new Usuario;
                    //criptografa a senha usando hash do php
                    $hash = password_hash($senha, PASSWORD_BCRYPT);
                    $usuario->nome     = $nome;
                    $usuario->username = $username;
                    $usuario->email    = $email;
                    $usuario->senha    = $hash;

                    $usuario->save();

                    return redirect('/login')->with('msg-sucesso', 'Usuário cadastrado com sucesso.');
                }else{
                    return redirect('/cadastro/usuario')->with('msg-erro', 'O username já existe no banco');
                }
            }else{
                return redirect('/cadastro/usuario')->with('msg-erro', 'O email já exite no banco');
            }
            
        }else{
            return redirect('/cadastro/usuario')->with('msg-erro', 'Por favor! Preencha todos os campos');
        }
    }

    public function auth(Request $request)
    {
        $emailOuUser = $request->emailOuUser;
        $senha       = $request->senha;

        if(!empty($emailOuUser) && !empty($senha)){
            
            /*verifica se o email ou username exite no banco
            se existir retorna um array com os dados do usuario*/
            $usuario =  Usuario::where('email', $emailOuUser)
                                ->orWhere('username', $emailOuUser)
                                ->first();
            
            //se a variável $usuario não estiver vazia
            if(!empty($usuario)){
                //verifica se é a mesma que está no banco
                if(password_verify($senha, $usuario['senha'])){
                     
                    session_start();
				    $_SESSION['logado'] = true;
				    $_SESSION['id'] 	= $usuario['id'];
                    $_SESSION['nome'] 	= $usuario['nome'];
                    
                    return redirect('/');

                 }else{
                    return redirect('/login')->with('msg-erro', 'Senha Incorreta.');
                 }

             }else{
                return redirect('/login')->with('msg-erro', 'Username ou email não está cadastrado.');
             }                                  
        }
    }

    public function sair(){
        session_start();
        session_destroy();
        return redirect('/login');
    }
}
