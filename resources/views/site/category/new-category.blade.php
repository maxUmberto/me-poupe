@extends('adminlte::page')

@section('title', 'Me Poupe - Nova Categoria')

@section('content_header')
  <h1>Nova Categoria</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <h3>Nova Categoria</h3>
      @include('site.includes.app')
    </div>
    <div class="box-body">
      <form method="post" action="{{ route('category-store') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Nome: </label>
          <input type="text" name="category-name" class="form-control" placeholder="Nome da categoria">
        </div>
        <!--
        <div class="form-group">
          <label for="objective">Objetivo: </label>
          <input type="text" name="objective" class="form-control" placeholder="R$">
        </div>
        -->
        <button type="submit" class="btn btn-primary">Criar Categoria</button>
      </form>
    </div>
  </div>
@stop