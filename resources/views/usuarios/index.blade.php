@extends('layouts.app')
@section('content')
<br>
<a class="btn btn-warning" href="{{ route('usuarios.create')}}">NUEVO</a>

<table class="table table-striped mt-2">
    <thead style="background-color: #1c87c9;">
        <th style="display:none;">ID</th>
        <th style="color:#1c87c9;">Nombre</th>
        <th style="color:#1c87c9;">E-mail</th>
        <th style="color:#1c87c9;">Rol</th>
        <th style="color:#1c87c9;">Acciones</th>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td style="display: none;">{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td> 
            <td>
                @if(!empty($usuario->getRoleNames()))
                    @foreach($usuario->getRoleNames() as $rolName)
                    <h5><span style="color: black !important;" class="badge badge-dark">{{$rolName}}</span></h5>
                    @endforeach
                @endif
            </td>
            <td>
                <a class="btn btn-info" href="{{route('usuarios.edit',$usuario->id)}}">Editar</a>
               
                {!! Form::open(['method'=> 'DELETE', 'route'=> ['usuarios.destroy',$usuario->id],'style'=>'display:inline'] )!!}
                  {!! Form::submit('Borrar',[ 'class'=>'btn btn-danger'])!!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination justify-content-end">
      {!! $usuarios->links() !!}
</div>

@endsection