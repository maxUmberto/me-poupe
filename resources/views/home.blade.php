@extends('adminlte::page')

@section('title', 'Me Poupe')

@section('content_header')
    <h1>Bem vindo {{ auth()->user()->name }}</h1>
@stop

@section('content')
    <div class="small-box bg-green">
        <div class="inner">
            <h3><sup style="font-size: 20px">R$</sup>0,00</h3>

            <p>Saldo Total</p>
        </div>
        <div class="icon">
            <i class="fa fa-dollar"></i>
        </div>
        <a href="{{ route('amount-details') }}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
    </div>
@stop