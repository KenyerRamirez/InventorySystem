@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Listado de usuarios</h1>
@stop

@section('content')
<a href="users/pdf" class="btn btn-success mb-3" target="_blank">PDF</a><br>

<table id="users" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo de sesión</th>
            <!-- <th scope="col">Acción</th> -->
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <!-- <td><form action="{{ route ('users.destroy',$user->id)}}" method="post">
                    <a href="/users/{{$user->id}}/edit" class="btn btn-info">Editar</a>
            </td> -->
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
        $('#users').DataTable({
            "lengthMenu":[[5,10,50,-1], [5,10,50,"Todos"]]
        });
    });
    </script>
@stop