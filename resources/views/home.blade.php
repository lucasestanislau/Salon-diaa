@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Dados de Hoje</h1>
@stop

@section('content')
<div class="row">
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>
          @if (isset($valorTotalEntrada))
          {{$valorTotalEntrada}}
          @endif
          <sup style="font-size: 20px">R$</sup></h3>

        <p>Entradas</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>
          @if (isset($valorTotalSaida))
          {{$valorTotalSaida}}
          @endif
          <sup style="font-size: 20px">R$</sup></h3>

        <p>Saídas</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>
          @if (isset($valorTotalEntrada) && isset($valorTotalSaida))
          {{($valorTotalEntrada - $valorTotalSaida)}}
          @endif
          <sup style="font-size: 20px">R$</sup></h3>

        <p>Saldo</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

</div>

@include('includes.graficos')

<h1>Lucas Vidoto</h1>
@stop