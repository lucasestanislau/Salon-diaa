@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Consultar Funcionários</h1>
@stop

@section('content')

<div class="row">
    @include('admin.includes.alerts')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de funcionários cadastrados no sistema</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Comissão %</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($funcionarios))
                        @foreach ($funcionarios as $funcionario)
                        <tr>
                            <td>{{$funcionario->nome}}</td>
                            <td>{{$funcionario->telefone}}</td>
                            <td>{{$funcionario->cpf ?? ''}}</td>
                            <td>{{$funcionario->rg ?? ''}}</td>
                            <td>{{$funcionario->comissao ?? ''}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('funcionarios.details', $funcionario->id)}}"
                                        class="btn btn-info">Detalhes</a>
                                    <a href="{{route('funcionarios.edit', $funcionario->id)}}"
                                        class="btn btn-warning">Editar</a>
                                    <a onclick="return confirm('Deseja Realmente desativar o funcionário?');"
                                        href="{{route('funcionarios.desativar', $funcionario->id)}}"
                                        class="btn btn-danger">Desativar</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @endif

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@stop