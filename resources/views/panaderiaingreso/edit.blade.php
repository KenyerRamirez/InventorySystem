@extends('adminlte::page')

@section('title', 'Panadería')

@section('content_header')
    <h1>EDITAR REGISTRO</h1>
@stop

@section('content')
<form action="/panaderiaingresos/{{$panaderiaingreso->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Tipo de pan o postre</label>
        <input type="text" id="tipo" name="tipo" class="form-control" tabindex="1" value="{{$panaderiaingreso->tipo}}" required="true">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" class="form-control" tabindex="2" value="{{$panaderiaingreso->cantidad}}" required="true">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input type="number" id="precio" name="precio" step="any" class="form-control" tabindex="3" value="{{$panaderiaingreso->precio}}" required="true">
    </div>
    <a href="/panaderiaingresos" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop