@extends('adminlte::page')

@section('title', 'Me Poupe - Saldo')

@section('content_header')
  <h1>Detalhes do saldo</h1>
@stop

@section('content')
  <div class="box">
    @include('site.includes.app')
    <div class="box-header">
      <a href="{{ route('amount-deposit') }}" class="btn btn-success">Depositar <i class="fa fa-arrow-circle-o-up"></i></a>
      @if($amount > 0)
        <a href="{{ route('amount-withdraw') }}" class="btn btn-danger">Sacar <i class="fa fa-arrow-circle-o-down"></i></a>
      @endif
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="small-box bg-green">
            <div class="inner">
              <p>Saldo Total</p>
              <h3><sup style="font-size: 20px">R$</sup>{{ number_format($amount, '2', ',', '.') }}</h3>

            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <div class="small-box-footer"></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <p>Saldo Disponível</p>
              <h3><sup style="font-size: 20px">R$</sup>0,00</h3>

            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <div class="small-box-footer"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop