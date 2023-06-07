<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
     --><style>
    h1{
        text-align: center;
        text-decoration: underline;
    }
    
    table, th, td{
    text-align: center;
    border-collapse: collapse;
    padding: 10px;
    max-width: 100%;
    }
    th{
        background-color: #5f5f5f;
        color: white;
        border-bottom: 4px solid crimson;
    }
    tr:nth-child(even){
        background-color: rgb(226, 226, 226);
        /*border-bottom: 2px solid rgb(201, 201, 201);*/
    }

    footer{
        background-color: #5f5f5f;
        border-top: 4px solid crimson;
        padding: 4px;
        text-align: center;
        color: white;
        position: absolute;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>
<body>
    <h1>Listado de artículos</h1>

    <table id="novedades" class="table table-striped table-bordered shadow-lg mt-4" width="100%">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col">Novedades</th>
            <th scope="col">Fecha</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($novedades as $novedade)
        <tr>
            <td>{{$novedade->novedades}}</td>
            <td>{{$novedade->created_at}}</td>
        @endforeach
    </tbody>
</table>

<div class="navbar fixed-bottom">
<footer>Panadería "Pan Castra" 2022 <br> Ubicada en San Cristóbal, Edo. Táchira, La Castra.</footer></div>

<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(370, 570, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    	</script>

</body>
</html>