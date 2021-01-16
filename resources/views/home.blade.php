@section('title', 'Home') 
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
    <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class=" mb-4">
                        @if($buscaNome)
                        <h2>Resultados para: {{$buscaNome}}</h2>
                        <a href="/">Mostrar todos</a>
                        @else
                        <h2>Lista de alunos</h2>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-4">
                            <form class="d-flex" id="nav-form" action="/" method="GET">
                                <input class="form-control me-2" type="search" placeholder="Digite o nome" aria-label="Search" name="buscaNome">
                                <button class="btn btn-green btn-sm" type="submit">Buscar</button>
                            </form>
                        </div>
                        <div class=" col-md-4 ">
                            <form class="d-flex" id="nav-form" action="/" method="GET">
                                <select class="form-select me-2" name="buscaStatus">
                                    <option selected value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                                <button class="btn btn-green btn-sm " type="submit">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table shadow p-3 mb-5 bg-white rounded ">
                    <thead class="bg-blue" style="color: white">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data nasc</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Status</th>
                            <th scope="col">Info</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $aluno)

                        <tr class="ts-hover">
                            <td>{{$aluno['nome']}}</td>
                            <td>{{$aluno['dataNasc']}}</td>
                            <td>{{$aluno['telefone']}}</td>

                            @if($aluno['status'] == true)

                            <td><span class="status-green">Ativo</span></td>

                            @endif

                            @if($aluno['status'] == false)

                            <td><span class="status-red">Inativo</span></td>

                            @endif

                            <td>
                                <a href="aluno/{{$aluno['id']}}" class="btn btn-sm btn-green"><i class="fa fa-info-circle"></i></a>
                            </td>
                            <td>
                                <a href="aluno/editar/{{$aluno['id']}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="aluno/delete/{{$aluno['id']}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            </a>
                        </tr>
                        
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endsection

