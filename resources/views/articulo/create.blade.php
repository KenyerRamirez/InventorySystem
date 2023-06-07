@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')

    <h1>CREAR REGISTROS</h1>
@stop

@section('content')
<form action="/articulos" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" tabindex="1" required="true">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" step="any" value="0.000 Kg/L" class="form-control" tabindex="2" required="true">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input type="number" id="precio" name="precio" step="any" placeholder="0.00" class="form-control" tabindex="3" required="true">
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