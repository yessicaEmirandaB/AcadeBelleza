<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>REPORTE DE LISTA DE ALUMNOS CURSO</title>
</head>

<body>
    <img src="imagenes/logo.jpg" alt="" width="50px" height="50px">
    <h1 class="text-center">ALUMNOS CURSOS</h1> <br>
    <table class="table table-striped table-bordered">
        <thead class="table-danger">
            <tr>
                <th>#</th>
                <th>Alumno</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>

            @foreach($detalles as $key => $detalle)
            <tr>
                <td>{{$key}}</td>
                <td> {{$detalle->Nombres}} {{$detalle->Apellidos}}</td>
                <td> {{$detalle->nombrecurso}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>