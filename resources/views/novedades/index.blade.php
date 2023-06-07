@extends('adminlte::page')

@section('title', 'Novedades')

@section('content_header')

    @if(request()->has('view_deleted'))

    <h1>Listado de novedades eliminadas</h1>

    @else
    <h1>Listado de novedades</h1>
    @endif
@stop

@section('content')
<a href="novedades/create" class="btn btn-primary mb-3">CREAR</a>
<a href="{{ route('novedades.pdf') }}" class="btn btn-success mb-3" target="_blank">{{ __('PDF') }}</a>
<a href="{{ route('novedades.index', ['view_deleted' => 'DeleteRecords']) }}" class="btn btn-info mb-3">
    REGISTROS ELIMINADOS
</a><br>

<table id="novedades" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Novedades</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($novedades as $novedade)
        <tr>
            <td>{{$novedade->id}}</td>
            <td>{{$novedade->novedades}}</td>
            <td>{{$novedade->created_at}}</td>
            <td>
            @if(request()->has('view_deleted'))

                <a href="{{ route('novedades.restore', $novedade->id) }}" class="btn btn-success">Restaurar</a>
                <a href="{{ route('novedades.forceDelete', $novedade->id) }}" class="btn btn-danger">Eliminar</a>

                @else

                <form action="{{ route ('novedades.destroy',$novedade->id)}}" method="post">
                    <a href="/novedades/{{$novedade->id}}/edit" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>

                @endif
            </td>
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
        $('#novedades').DataTable({
            "lengthMenu":[[5,10,50,-1], [5,10,50,"Todos"]]
        });
    });
    </script>
@stop