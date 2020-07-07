@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Consultar Saídas</h1>
@stop

@section('content')

<div class="row">
    @include('admin.includes.alerts')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Saídas Registradas no sistema</h3>

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
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($saidas))
                        @foreach ($saidas as $saida)
                        <tr>
                            <td>{{$saida->descricao}}</td>
                            <td>{{$saida->valor}}</td>
                            <td>{{date('d-M-Y - H:i', strtotime($saida->created_at))}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('financeiro.saida.edit', $saida->id)}}"
                                        class="btn btn-warning">Editar</a>
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