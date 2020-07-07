@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Editar Vale Sócio</h1>
@stop

@section('content')


<div class="col-12">
    <!-- interactive chart -->
    <div class="card card-primary card-outline">

        <div class="card-body">


            <form action="{{route('valesocio.update')}} " method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{$vale->id}}">
                @include('admin.ValeSocio.includes.form')

            </form>
        </div>

    </div>
    <!-- /.card -->

</div>
<div class="col-12">
    @include('admin.includes.alerts')
</div>


@stop