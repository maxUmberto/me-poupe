@extends('adminlte::page')

@section('title', 'Me Poupe - Categorias')

@section('content_header')
  <h1>Categorias</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
    @include('site.includes.app')
      <h3>{{ $category->name }}</h3>
      @if($balance->amount > 0)
        <a href="{{ route('category-deposit', ['id' => $id]) }}" class="btn btn-success">Adicionar saldo <i class="fa fa-plus"></i></a>
      @endif
      @if($category->amount > 0)
        <a href="{{ route('category-withdraw', ['id' => $id]) }}" class="btn btn-danger">Retirar saldo <i class="fa fa-plus"></i></a>
      @endif
      <a href="{{ route('category-edit', ['id' => $id]) }}" class="btn btn-primary">Editar Categoria <i class="fa fa-edit"></i></a>
    </div>
    <div class="box-body">
      <div class="small-box bg-blue">
        <div class="inner">
          <p>Saldo</p>
          <h3><sup style="font-size: 20px">R$</sup>{{ number_format($category->amount, '2', ',', '.') }}</h3>

        </div>
        <div class="icon">
          <i class="{{ $category->symbol }}"></i>
        </div>
        <div class="small-box-footer"></div>
      </div>
    </div>
@stop