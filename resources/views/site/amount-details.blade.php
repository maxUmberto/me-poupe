@extends('adminlte::page')

@section('title', 'Me Poupe - Saldo')

@section('content_header')
  <h1>Detalhes do saldo</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <a href="" class="btn btn-success">Depositar <i class="fa fa-arrow-circle-o-up"></i></a>
      <a href="" class="btn btn-danger">Sacar <i class="fa fa-arrow-circle-o-down"></i></a>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><sup style="font-size: 20px">R$</sup>0,00</h3>

              <p>Saldo Total</p>
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
              <h3><sup style="font-size: 20px">R$</sup>0,00</h3>

              <p>Saldo Disponível</p>
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