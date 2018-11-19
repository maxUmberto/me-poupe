@extends('adminlte::page')

@section('title', 'Me Poupe - Excluir Categoria')

@section('content_header')
  <h1>Excluir</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <h3>Excluir Categoria</h3>
      @include('site.includes.app')
    </div>
    <div class="box-body">
      <h4>Tem certeza que deseja excluir a categoria <b>{{ $category->name }}</b>?</h4>
      <p>Saldo: <b>R${{ number_format($category->amount, '2', ',', '.') }}</b></p>

      <a href="{{ route('store-delete', ['id' => $id]) }}" class="btn btn-danger">Excluir <i class="fa fa-trash"></i></a>
      <a href="{{ route('category-edit', ['id' => $id]) }}" class="btn btn-primary">Voltar <i class="fa fa-reply"></i></a>

    </div>
  </div>
@stop