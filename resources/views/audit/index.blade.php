@extends('adminlte::page')

@section('title', 'Audits')

@section('content_header')
    <h1>Auditoria</h1>
@stop

@section('content')
<a href="{{ route('audits.pdf') }}" class="btn btn-success mb-3" target="_blank">{{ __('PDF') }}</a><br>

<table id="audits" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col">ID de usuario</th>
            <th scope="col">Acción</th>
            <th scope="col">Apartado</th>
            <th scope="col">Modificación</th>
            <th scope="col">Historial</th>
            <th scope="col">Fecha de creación</th>
            <th scope="col">Fecha de modificación</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($audits as $audit)
        <tr>
            <td>{{$audit->user_id}}</td>
            <td>{{$audit->event}}</td>
            <td>{{$audit->auditable_type}}</td>
            <td>{{$audit->new_values}}</td>
            <td>{{$audit->old_values}}</td>
            <td>{{$audit->created_at}}</td>
            <td>{{$audit->updated_at}}</td>
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
        $('#audits').DataTable({
            "lengthMenu":[[5,10,50,-1], [5,10,50,"Todos"]]
        });
    });
    </script>
@stop