@extends('adminlte::page')

@section('title', 'Me Poupe - Histórico')

@section('content_header')
  <h1>Histórico</h1>
@stop

@section('content')
  <div class="box">
    @include('site.includes.app')
    <div class="box-header">
      <h3>Histórico</h3>
      <form action="{{ route('search') }}" method="post" class="form form-inline">
        {{ csrf_field() }}
        <input type="date" name="date" class="form-control">
        <select name="type" class="form-control">
          <option value="">-- Selecione o tipo --</option>
          @foreach($types as $key => $type)
            <option value="{{ $key }}">{{ $type }}</option>
          @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Pesquisar</button>
      </form>
    </div>
    <div class="box-body table-responsive">
      @if(count($historics) > 0)
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Tipo</th>
              <th>Valor</th>
              <th>Saldo antes</th>
              <th>Saldo depois</th>
              <th>Data</th>
            </tr>
          </thead>
          <tbody>
          @foreach($historics as $historic)
            <tr>
              <td>{{ $historic->type($historic->type) }}</td>
              <td>R$ {{ number_format($historic->amount, '2', ',', '.' )}}</td>
              <td>R$ {{ number_format($historic->amount_before, '2', ',', '.' )}}</td>
              <td>R$ {{ number_format($historic->amount_after, '2', ',', '.' )}}</td>
              <td>{{ $historic->date}} - {{ $historic->time }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      @else
        <h2>Não existem registros para serem exibidos</h2>
      @endif
      @if(isset($dataForm))
        {{ $historics->appends($dataForm)->links() }}
      @else
        {{ $historics->links() }}
      @endif
    </div>
  </div>
@stop