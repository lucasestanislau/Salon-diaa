@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Cadastrar Serviço</h1>
@stop

@section('content')


<div class="col-12">
    <!-- interactive chart -->
    <div class="card card-primary card-outline">

        <div class="card-body">


            <form action="
            
            {{ isset($servico) ? route('servicos.update') : route('servicos.store')  }}
            
            " method="POST">

                @if (isset($servico))
                @method('PUT')

                <input type="hidden" name="id" value="{{$servico->id}}">
                @endif

                @include('admin.servicos.includes.form')

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>

    </div>
    <!-- /.card -->

</div>
<div class="col-12">
    @include('admin.includes.alerts')
</div>

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Servicos/Produtos cadastrados no sistema</h3>

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
                            <th>Descricão</th>
                            <th>Preço R$</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($servicos))
                        @foreach ($servicos as $servico)
                        <tr>
                            <td>{{$servico->descricao}}</td>
                            <td>{{$servico->preco}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('servicos.edit', $servico->id)}}"
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