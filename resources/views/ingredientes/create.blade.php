@extends('adminlte::page')

@section('title', 'Panadería')

@section('content_header')
    <h1>REGISTRAR INGREDIENTES</h1>
@stop

@section('content')
<form action="/ingredientes" method="POST">
    @csrf
    <!-- <div class="mb-3">
        <label for="" class="form-label">Tipo de pan o poste</label>
        <select id="tipo" name="tipo" class="form-control" tabindex="1" required="true">
            <option value="">
                <select name="" id="" disabled="disabled"></select>
            </option>
        </select>
    </div> -->

    

    <div>
            <div class="col-12 mb-3">
                <label for="" class="form-label">Producto</label>
                <select class="id form-control" id="id" name="id" aria-label="Default select example">
                <option selected value="" disabled="true">Seleccione el tipo de pan o postre</option>

                @foreach($articulo as $articulo)

                <option value="{{$articulo->id}}">{{$articulo->descripcion}}</option>

                @endforeach
                </select>
            </div>


    </div>



    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" oninput="calcular()" class="form-control" tabindex="2" required="true">
        <label for="" class="form-label">Precio</label>
        <input type="number" id="precio_pan" name="precio_pan" step="any" placeholder="0.00" oninput="calcular()" class="form-control" tabindex="3" required="true">
        <label for="" class="form-label">Precio Total</label>
        <input type="number" id="precio" name="precio" step="any" value="0.00" class="form-control" tabindex="3">
    </div>
    <a href="/panaderiaventas" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script type="text/javascript">
		
		function calcular(){
			try{
				var a = parseFloat(document.getElementById("precio_pan").value) || 0;
				b = parseFloat(document.getElementById("cantidad").value) || 0;

				document.getElementById("precio").value = a*b;
			}catch(e){}
		}

	</script>
@stop