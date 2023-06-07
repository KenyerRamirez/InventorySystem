@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')
    <h1>EDITAR REGISTROS</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}
        </strong>
    </div>
@endif

<form action="/users/{{$user->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="name" name="name" class="form-control" tabindex="1" value="{{$user->name}}" disabled="true">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control" tabindex="2" value="{{$user->email}}" disabled="true">
    </div>
    <div class="mb-3">
        <h5>Listado de roles</h5>
        @foreach ($roles as $role)
        <br>
            <label>
                <input class="mr-1" id="role" name="role" type="checkbox" value="{{$role->id}}">
                {{$role->name}}
            </label>
        @endforeach
    </div>
    <a href="/users" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="2">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop