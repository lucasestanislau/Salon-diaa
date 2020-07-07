@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Editando Entrada: <strong> {{$entrada->descricao ?? 'ERRO'}} -
        {{$entrada->created_at->format('d/m/Y H:i')}} </strong></h1>

@stop

@section('content')


<div class="col-12">
    <!-- interactive chart -->
    <div class="card card-primary card-outline">

        <div class="card-body">


            <form action="{{route('financeiro.entrada.update')}}" method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{$entrada->id}}">
                @include('admin.financeiro.entrada.includes.form')


            </form>
        </div>

    </div>
    <!-- /.card -->

</div>

<div class="col-12">
    @include('admin.includes.alerts')
</div>

@stop