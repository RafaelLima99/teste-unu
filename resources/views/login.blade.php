
@section('title', 'Login') 
@extends('layouts.login-cadastro') 
@section('content') 

@if(session('msg-sucesso'))
  <div class="alert alert-success" role="alert">
    {{ session('msg-sucesso') }}
  </div>
@endif  
@if(session('msg-erro'))
  <div class="alert alert-danger" role="alert">
    {{ session('msg-erro') }}
  </div>
@endif  
    <div class="container d-flex">
      <div class="row d-flex justify-content-center">
        <div class="col-md-4  align-self-center shadow-lg rounded" id="div-login">
          <div id="titulo">LOGIN</div>
            <form action="/auth" method="POST">
            @csrf
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" placeholder="User ou Email" aria-label="Username" 
                name="emailOuUser">
              </div>     
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </span>
                <input type="password" class="form-control" placeholder="Senha" aria-label="Username"
                name="senha">
              </div>     
              <div id="opcao" >
                <p>Ou <a href="">esqueci a Senha</a></p>
                <p>Não tem uma conta? <a href="/criar-conta">Inscreva-se</a></p>
              </div>           
              <button type="submit" class="btn" id="btn-entrar">Entrar</button>
            </form>
        </div>
      </div>
    </div>
@endsection