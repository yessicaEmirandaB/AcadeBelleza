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
       @can('crear-alumnos')
        <div class="card-header d-inline-flex">
            <a href="{{url('Alumno/create') }}" class="btn btn-success">Registrar nuevo estudiante</a>
        </div>
        @endcan
    <br>
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <a class="navbar-brand">Listar</a>
                        <select class="form-select" id="limit" name="limit">
                            @foreach([10,20,30,50,100] as $limit)
                            <option value="{{$limit}}" @if(isset($_GET['limit'])) {{($_GET['limit']==$limit)?'selected':''}}@endif>{{$limit}}</option>
                            @endforeach
                        </select>

                        <?php
                        if (isset($_GET['page'])) {
                            $pag = $_GET['page'];
                        } else {
                            $pag = 1;
                        }
                        if (isset($_GET['limit'])) {
                            $limit = $_GET['limit'];
                        } else {
                            $limit = 10;
                        }
                        ?>

                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <a class="navbar-brand">Buscar</a>
                        <input class="form-control mr-sm-2" type="search" id="search" aria-label="Search" value="{{ (isset($_GET['search']))?$_GET['search']:''}}">
                    </div>
                </div>
                @if($alumno->total()>10)
                {{$alumno->links()}}
                @endif
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead class="table-danger">
                <tr>
                    <th>#</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>CI</th>
                    <th>Direccion</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Foto</th>
                    <th>User</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumno as $alumnos)
                <tr>
                    <td>{{$alumnos->id}}</td>
                    <td>{{$alumnos->Apellidos}}</td>
                    <td>{{$alumnos->Nombres}}</td>
                    <td>{{$alumnos->CI}}</td>
                    <td>{{$alumnos->Direccion}}</td>
                    <td>{{$alumnos->Celular}}</td>
                    <td>{{$alumnos->Correo}}</td>

                    <td>
                        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$alumnos->Foto}}" width="100" alt="" />
                    </td>
                    <td>{{$alumnos->user_id}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                        @can('ver-alumnos')
                        <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                        @endcan
                        @can('editar-alumnos')
                            <a href="{{url('/Alumno/'.$alumnos->id.'/edit') }}" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                            @endcan
                            @can('borrar-alumnos')
                             <form action="{{ url('/Alumno/'.$alumnos->id)}}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}

                                
                                <button type="submit" class="btn btn-danger"  onclick="return confirm('¿Desea eliminar?')" value="Borrar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                
                            </form>
                            @endcan
                        </div>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if($alumno->total()>10)
        {{$alumno->links()}}
        @endif
    </div>
</div>
<!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
<Script type="text/javascript">
    $('#limit').on('change', function() {
        window.location.href = "{{ route('Alumno.index')}}?limit=" + $(this).val() + '&search=' + $('#search').val()
    })

    $('#search').on('keyup', function(e) {
        if (e.keyCode == 13) {
            window.location.href = "{{ route('Alumno.index')}}?limit=" + $('#limit').val() + '&search=' + $(this).val()
        }
    })
</Script>
@endsection
