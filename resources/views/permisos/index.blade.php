@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <section class="section">
            <div class="section-header">
                <h3 class="page__heading">Permisos</h3>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                            @can('crear-rol')
                            <a class="btn btn-success" href="{{ route('permisos.create') }}">Nuevo</a>
                            @endcan

                            <br>
                                <table class="table table-striped table-bordered">
                                    <thead class="table-warning">
                                        <th style="color:#ff7b00;">Permiso</th>
                                        <th style="color:#ff7b00;">Acciones</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($permisos as $permiso)
                                    <tr>
                                        <td>{{ $permiso->name }}</td>
                                        <td>
                                            @can('editar-rol')
                                                <a class="btn btn-primary" href="{{ route('permisos.edit',$permiso->id) }}">Editar</a>
                                            @endcan

                                            @can('borrar-rol')
                                                {!! Form::open(['method' => 'DELETE','route' => ['permisos.destroy', $permiso->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <!-- Centramos la paginacion a la derecha -->
                                <div class="pagination justify-content-end">
                                    {!! $permisos->links() !!}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</div>
@endsection
