@extends('adminlte::page')

@section('title', "Me Poupe - $category->name")

@section('content_header')
  <h1>Depósito - {{ $category->name }}</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <h3>Realizar depósito em: {{ $category->name }}</h3>
      <h4><b>Categoria:</b> {{ $category->name }}</h4>
      <h4><b>Saldo Disponível: </b> R$ {{ number_format($balance->avaiable_amount, '2', ',', '.') }}</h4>
    </div>
    <div class="box-body">
      @include('site.includes.app')
      <form class="form-inline" method="post" action="{{ route('category-deposit-store', ['id' => $id]) }}">
        <div class="form-group">
          {{ csrf_field() }}
          <input type="text" class="form-control" name="value" placeholder="Valor do depósito">

          <button type="submit" class="btn btn-success">Depositar</button>
        </div>
      </form>
    </div>
  </div>
@stop