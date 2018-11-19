@extends('adminlte::page')

@section('title', 'Me Poupe')

@section('content_header')
    <h1>Bem vindo {{ auth()->user()->name }}</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
      <div class="small-box bg-green">
          <div class="inner">
              <h3><sup style="font-size: 20px">R$</sup>{{ number_format($amount, '2', ',', '.') }}</h3>

              <p>Saldo Total</p>
          </div>
          <div class="icon">
              <i class="fa fa-dollar"></i>
          </div>
          <a href="{{ route('amount-details') }}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header">
      <h3>Categorias</h3>
    </div>
    <div class="box-body">
      @if(empty($categories[0]))
        <h3>Você ainda não possui categorias</h3>
        <a href="{{ route('add-category') }}" class="btn btn-primary">Nova Categoria <i class="fa fa-plus"></i></a>
      @else
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
                <a href="{{ route('category-detail', ['id' => $category->id]) }}" class="small-box-footer">Mais
                  informações <i class="fa fa-arrow-circle-right"></i></a>

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
      @endif
    </div>
@stop