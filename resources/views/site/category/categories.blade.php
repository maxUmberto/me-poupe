@extends('adminlte::page')

@section('title', 'Me Poupe - Categorias')

@section('content_header')
  <h1>Categorias</h1>
@stop

@section('content')
  <div class="box">
    @include('site.includes.app')
    <div class="box-header">
      <h3>Suas categorias</h3>
      <a href="{{ route('add-category') }}" class="btn btn-primary">Nova Categoria <i class="fa fa-plus"></i></a>
    </div>
    <div class="box-body">
      <?php $i = 0; ?>
      <div class="row">
      @foreach($categories as $category)

        <div class="col-sm-4">
          <div class="small-box bg-blue">
            <div class="inner">
              <p>{{ $category->name }}</p>
              <h3><sup style="font-size: 20px">R$</sup>{{ number_format($category->amount, '2', ',', '.') }}</h3>

            </div>
            <div class="icon">
              <i class="{{ $category->symbol }}"></i>
            </div>
            <a href="{{ route('category-edit', ['id' => $category->id]) }}" class="small-box-footer">Editar <i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>
        @if($i == 2)
          </div>
          <div class="row">
          <?php $i = 0 ?>
        @else
          <?php $i++ ?>
        @endif
      @endforeach
    </div>
  </div>
@stop