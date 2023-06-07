@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')
    <h1>EDITAR REGISTROS</h1>
@stop

@section('content')
<form action="/articulos/{{$articulo->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" tabindex="1" value="{{$articulo->descripcion}}" required="true">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" class="form-control" tabindex="2" value="{{$articulo->cantidad}}" required="true">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input type="number" id="precio" name="precio" step="any" class="form-control" tabindex="3" value="{{$articulo->precio}}" required="true">
    </div>
    <a href="/articulos" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop