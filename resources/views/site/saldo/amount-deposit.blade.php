@extends('adminlte::page')

@section('title', 'Me Poupe - Depósito')

@section('content_header')
  <h1>Depósito</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <h3>Realizar depósito</h3>
    </div>
    <div class="box-body">
    @include('site.includes.app')
      <form class="form-inline" method="post" action="{{ route('deposit-store') }}">
        <div class="form-group">
          {{ csrf_field() }}
          <input type="text" class="form-control" name="value" placeholder="Valor do depósito">

          <button type="submit" class="btn btn-success">Depositar</button>
        </div>
      </form>
    </div>
  </div>
@stop