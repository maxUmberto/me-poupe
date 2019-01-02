@extends('adminlte::page')

@section('title', 'Me Poupe - Perfil')

@section('content_header')
  <h1>Seu perfil</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <h3>Seus dados</h3>
    </div>
    <div class="box-body">
      @include('site.includes.app')
      <form action="{{ route('profile-edit') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" name="name" class="form-control" placeholder="Seu nome" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Seu email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <!--@if(auth()->user()->user_photo != null)
            <img src="{{ url('storage/profile/'.auth()->user()->user_photo) }}" alt="{{ auth()->user()->name }}" style="max-width: 50px;">
          @endif-->
          <label for="image">Imagem: </label>
          <input type="file" name="user_photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Editar <i class="fa fa-edit"></i></button>
      </form>
    </div>
  </div>
@stop