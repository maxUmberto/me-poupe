@extends('adminlte::page')

@section('title', 'Me Poupe - Saque')

@section('content_header')
  <h1>Saque</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <h3>Realizar saque</h3>
      <h3>Saldo disponível para saque: R${{ number_format($amount, '2', ',', '.') }}</h3>
    </div>
    <div class="box-body">
      @include('site.includes.app')
      <form class="form-inline" method="post" action="{{ route('withdraw-store') }}">
        <div class="form-group">
          {{ csrf_field() }}
          <input type="text" class="form-control" name="value" placeholder="Valor do saque">

          <button type="submit" class="btn btn-danger">Sacar</button>
        </div>
      </form>
    </div>
  </div>
@stop