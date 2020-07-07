@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Cadastrar Funcionário</h1>
@stop

@section('content')


<div class="col-12">
  <!-- interactive chart -->
  <div class="card card-primary card-outline">

    <div class="card-body">


      <form action="{{route('funcionarios.store')}}" method="POST" enctype="multipart/form-data">
        @include('admin.funcionarios.includes.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
    </div>
    @include('admin.includes.alerts')

  </div>
  <!-- /.card -->

</div>


@stop