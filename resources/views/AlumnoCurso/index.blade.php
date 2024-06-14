@extends('layouts.app')
@section('content')
<br>
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card-header d-inline-flex">
        <a href="{{url('AlumnoCurso/create') }}" class="btn btn-success">Crear</a>
        &nbsp;
        <a href="{{url('AlumnoCurso/pdf') }}" class="btn btn-success" target="_blank">PDF</a>
    </div>
    <br>


    <form class="d-flex" method="GET" action="{{ url('AlumnoCurso') }}">
        <input name="search" class="form-control me-2" type="search" placeholder="Escribe el nombre" aria-label="Search" value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

    <div class="container mt-4">
        <table class="table table-striped table-bordered">
            <thead class="table-danger">
                <tr>
                    <th>#</th>
                    <th>Alumno</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($detalles as $key => $detalle)
                <tr>
                    <td>{{$key}}</td>
                    <td> {{$detalle->Nombres}} {{$detalle->Apellidos}}</td>
                    <td> {{$detalle->nombrecurso}} </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>

                            <a href="{{url('/AlumnoCurso/'.$detalle->id.'/edit') }}" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>

                            <form action="{{ url('/AlumnoCurso/'.$detalle->id)}}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar?')" value="Borrar"><i class="fa fa-trash" aria-hidden="true"></i></button>

                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <!-- Enlaces de paginación -->
        {{ $detalles->appends(['search' => request('search')])->links() }}
    </div>

</div>

@endsection