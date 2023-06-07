@extends('adminlte::page')

@section('title', 'Artículos')
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

@section('content_header')

    @if(request()->has('view_deleted'))

    <h1>Listado de artículos eliminados</h1>

    @else

    <h1>Listado de artículos</h1>

    @endif
@stop

@section('content')
<a href="articulos/create" class="btn btn-primary mb-3">CREAR</a>
<a href="{{ route('articulos.pdf') }}" class="btn btn-success mb-3" target="_blank">{{ __('PDF') }}</a>
<a href="{{ route('articulos.index', ['view_deleted' => 'DeleteRecords']) }}" class="btn btn-info mb-3">
    REGISTROS ELIMINADOS
</a>
<!-- <a href="articulos/restore" class="btn btn-info mb-3">REGISTROS ELIMINADOS</a><br> -->

<table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Descripción</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->descripcion}}</td>
            <td>{{$articulo->cantidad}} Kg/L</td>
            <td>{{$articulo->precio}}</td>
            <td>

                @if(request()->has('view_deleted'))

                <a href="{{ route('articulo.restore', $articulo->id) }}" class="btn btn-success">Restaurar</a>
                <a href="{{ route('articulo.forceDelete', $articulo->id) }}" class="btn btn-danger">Eliminar</a>
                
                @else

                <form action="{{ route ('articulos.destroy',$articulo->id)}}" method="post">
                    <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-info">Editar</a>
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
        $('#articulos').DataTable({
            "lengthMenu":[[5,10,50,-1], [5,10,50,"Todos"]]
        });
    });
        $(document).ready(function() {
                    $('.eliminar').click(function(e) {
                        if(!confirm('Está seguro de eliminar este artículo?')) {
                            e.preventDefault();
                        }
                    });
                });
    </script>
@stop