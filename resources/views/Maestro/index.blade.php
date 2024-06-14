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
        <a href="{{url('Maestro/create') }}" class="btn btn-success">Registrar nuevo maestro</a>
    </div>
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
                @if($maestro->total()>10)
                {{$maestro->links()}}
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
                    <th>Especialidad</th>
                    <th>User</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($maestro as $maestros)
                <tr>
                    <td>{{$maestros->id}}</td>
                    <td>{{$maestros->apellidos}}</td>
                    <td>{{$maestros->nombres}}</td>
                    <td>{{$maestros->ci}}</td>
                    <td>{{$maestros->direccion}}</td>
                    <td>{{$maestros->celular}}</td>
                    <td>{{$maestros->correo}}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$maestros->Foto}}" width="100" alt="" />
                    </td>

                    <td>{{$maestros->especialidad}}</td>
                    <td>{{$maestros->user_id}}</td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>

                            <a href="{{url('/Maestro/'.$maestros->id.'/edit') }}" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>

                             <form action="{{ url('/Maestro/'.$maestros->id)}}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger"  onclick="return confirm('¿Desea eliminar?')" value="Borrar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                
                            </form>
                        </div>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if($maestro->total()>10)
        {{$maestro->links()}}
        @endif
    </div>
</div>
<!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
<Script type="text/javascript">
    $('#limit').on('change', function() {
        window.location.href = "{{ route('Maestro.index')}}?limit=" + $(this).val() + '&search=' + $('#search').val()
    })

    $('#search').on('keyup', function(e) {
        if (e.keyCode == 13) {
            window.location.href = "{{ route('Maestro.index')}}?limit=" + $('#limit').val() + '&search=' + $(this).val()
        }
    })
</Script>
@endsection