@extends('adminlte::page')

@section('title', 'Me Poupe - Saque')

@section('content_header')
  <h1>Saque {{ $category->name }}</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <h3>Realizar saque em {{ $category->name }}</h3>
      <h3>Saldo disponível para saque: R${{ number_format($category->amount, '2', ',', '.') }}</h3>
    </div>
    <div class="box-body">
      @include('site.includes.app')
      <form class="form-inline" method="post" action="{{ route('category-withdraw-store', ['id' => $id]) }}">
        <div class="form-group">
          {{ csrf_field() }}
          <input type="text" class="form-control" name="value" placeholder="Valor do saque">

          <button type="submit" class="btn btn-danger">Sacar</button>
        </div>
      </form>
    </div>
  </div>
@stop