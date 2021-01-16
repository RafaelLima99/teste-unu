@section('title', 'Informa') 
@extends('layouts.main') 
@section('content') 

    <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-10 mt-5">
            <div class=" shadow p-3 mb-5 bg-white rounded">
              <div class="row">
                <div class="col-md-12 mb-4 text-user">
                  <h1>Informações do aluno</h1>
                </div>
                <div class="col-md-6">
                  <p><strong>Nome: </strong>{{$aluno->nome}}</p>
                  <p><strong>Data Nascimento: </strong>{{$aluno->dataNasc}}</p>
                  <p><strong>Serie: </strong>{{$aluno->serie}}</p>
                  <p><strong>Telefone: </strong>{{$aluno->telefone}}</p>
                </div>
                <div class="col-md-6">
                  <p><strong>Cep: </strong>{{$aluno->cep}}</p>
                  <p><strong>Cidade: </strong>{{$aluno->cidade}}</p>
                  <p><strong>Estado: </strong>{{$aluno->estado}}</p>
                  <p><strong>Status: </strong>{{$aluno->nome}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection

