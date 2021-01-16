@section('title', 'Login') 
@extends('layouts.login-cadastro') 
@section('content') 

@if(session('msg-erro'))
  <div class="alert alert-danger" role="alert">
    {{ session('msg-erro') }}
  </div>
@endif  

<div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-4  align-self-center shadow-lg rounded" id="div-login">
          <div id="titulo">Criar Conta</div>
            <form action="/usuario-insert" method="POST">
            @csrf
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" placeholder="Nome" aria-label="Nome" name="nome">
              </div> 
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                </span>
              <input type="text" class="form-control" placeholder="Username" aria-label="username" 
              name="username">
              </div>        
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
              <input type="text" class="form-control" placeholder="E-mail" aria-label="Email" name="email">
              </div>     
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </span>
                <input type="password" class="form-control" placeholder="Senha" aria-label="Senha" name="senha">
              </div>
              <div id="opcao" >
                <p>Ou <a href="/login">já tenho uma conta</a></p>
              </div>
              <button type="submit" class="btn " id="btn-entrar">Cadastrar</button>
            </form>
        </div>
      </div>
    </div>