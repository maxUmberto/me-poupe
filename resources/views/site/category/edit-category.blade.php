@extends('adminlte::page')

@section('title', 'Me Poupe - Editar Categoria')

@section('content_header')
  <h1>Editar Categoria</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <h3>Editar Categoria</h3>
      @include('site.includes.app')
    </div>
    <div class="box-body">
      <form method="post" action="{{ route('edit-store', ['id' => $id]) }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Nome: </label>
          <input type="text" value="{{ $category->name }}" name="category-name" class="form-control" placeholder="Nome da categoria">
        </div>
        <!--
        <div class="form-group">
          <label for="objective">Objetivo: </label>
          <input type="text" name="objective" class="form-control" placeholder="R$">
        </div>
        -->
        <button type="submit" class="btn btn-primary">Editar <i class="fa fa-edit"></i></button>
        <a href="{{ route('category-delete', ['id' => $id]) }}" class="btn btn-danger">Excluir <i class="fa fa-trash"></i></a>
      </form>
    </div>
  </div>
@stop