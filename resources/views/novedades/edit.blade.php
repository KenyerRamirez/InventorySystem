@extends('adminlte::page')

@section('title', 'Novedades')

@section('content_header')
    <h1>EDITAR NOVEDADES</h1>
@stop

@section('content')
<form action="/novedades/{{$novedade->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Novedades</label>
        <input type="text" id="novedades" name="novedades" class="form-control" tabindex="1" value="{{$novedade->novedades}}" required="true">
    </div>
    <a href="/novedades" class="btn btn-secondary" tabindex="2">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="1">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop