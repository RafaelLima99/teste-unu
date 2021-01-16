@section('title', 'Cadastro')
@extends('layouts.main')
@section('content')
  @if(session('msg-sucesso'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('msg-sucesso')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if(session('msg-erro'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('msg-erro')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-9  shadow p-3 mb-5 bg-white rounded">
            <div class="text-user mb-4">
              <h2>Cadastro de usuário</h2>
            </div>
            <form class="row g-3" action="aluno/insert" method="POST">
            @csrf
              <div class="col-md-6">
                <label for="inputNome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Digite o nome">
              </div>
              <div class="col-md-6">
                  <label for="inputTelefone" class="form-label">Telefone:</label>
                  <input type="text" class="form-control" id="inputTelefone" name="telefone" placeholder="(00)0000-0000">
                </div>
                <div class="col-md-4">
                  <label for="inputDataNasc" class="form-label">Data Nascimento:</label>
                  <input type="text" class="form-control" id="inputDataNasc" name="dataNasc" placeholder="dd/mm/aaaa"> 
                </div>
                <div class="col-md-4">
                  <label for="inputTelefone" class="form-label">Série:</label>
                  <select class="form-select" name="id_serie">

                    @foreach($series as $serie)

                    <option value="{{$serie['id']}}">{{$serie['serie']}}</option>

                    @endforeach

                  </select>
                </div>
                <div class="col-md-4">
                  <label for="inputTelefone" class="form-label">Status:</label>
                  <select class="form-select" name="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                  </select>
                </div>
              <div class="col-md-4">
                <label for="inputCep" class="form-label">Cep:</label>
                  <div class="d-flex">
                      <input type="text" class="form-control me-2" id="inputCep" name="cep" placeholder="Digite o cep">
                      <button type="button" class="btn btn-primary btn-sm" onclick="consultaCep()">Pesquisar</button>
                  </div>
              </div>
              <div class="col-md-4">
                <label for="inputEstado" class="form-label">Estado:</label>
                <input id="inputEstado" class="form-control" name="estado" readonly>
              </div>
              <div class="col-md-4">
                <label for="inputCidade" class="form-label">Cidade:</label>
                <input id="inputCidade" class="form-control" name="cidade" readonly>
              </div>
              <div class="col-12 mt-5 mb-4">
                <button type="submit" class="btn btn-green">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endsection