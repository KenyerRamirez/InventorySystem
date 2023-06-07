@extends('adminlte::page')

@section('title', 'Panadería')

@section('content_header')

    @if(request()->has('view_deleted'))

    <h1>Listado de salidas eliminadas</h1>

    @else
    <h1>Listado de salidas</h1>
    @endif
@stop

@section('content')
<a href="panaderiaventas/create" class="btn btn-primary mb-3">CREAR</a>
<a href="panaderiaventas/pdf" class="btn btn-success mb-3" target="_blank">PDF</a>
<a href="{{ route('panaderiaventas.index', ['view_deleted' => 'DeleteRecords']) }}" class="btn btn-info mb-3">
    REGISTROS ELIMINADOS
</a><br>

<table id="panaderiaventas" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo de pan</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Fecha de venta</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>

    

        @foreach ($panaderiaventas as $panaderiaventa)
        <tr>
            <td>{{$panaderiaventa->id}}</td>
            <td>{{$panaderiaventa->tipo}}</td>
            <td>{{$panaderiaventa->cantidad}}</td>
            <td>{{$panaderiaventa->precio}}</td>
            <td>{{$panaderiaventa->created_at}}</td>
            <td>

                @if(request()->has('view_deleted'))

                <a href="{{ route('panaderiaventa.restore', $panaderiaventa->id) }}" class="btn btn-success">Restaurar</a>
                <a href="{{ route('panaderiaventa.forceDelete', $panaderiaventa->id) }}" class="btn btn-danger">Eliminar</a>

                @else

                <form action="{{ route ('panaderiaventas.destroy',$panaderiaventa->id)}}" method="post">
                    <a href="/panaderiaventas/{{$panaderiaventa->id}}/edit" class="btn btn-info">Editar</a>
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
        $('#panaderiaventas').DataTable({
            "lengthMenu":[[5,10,50,-1], [5,10,50,"Todos"]]
        });
    });
    </script>
@stop