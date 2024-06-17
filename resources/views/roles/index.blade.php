@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <section class="section">
            <div class="section-header">
                <h3 class="page__heading">Roles</h3>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
            
                            @can('crear-rol')
                            <a class="btn btn-success" href="{{ route('roles.create') }}">Nuevo</a>                        
                            @endcan
            
                            <br>
                                <table class="table table-striped table-bordered">
                                    <thead class="table-warning">                                                       
                                        <th style="color:#ff7b00;">Rol</th>
                                        <th style="color:#ff7b00;">Acciones</th>
                                    </thead>  
                                    <tbody>
                                    @foreach ($roles as $role)
                                    <tr>                           
                                        <td>{{ $role->name }}</td>
                                        <td>                                
                                            @can('editar-rol')
                                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                            @endcan
                                            
                                            @can('borrar-rol')
                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
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
                                    {!! $roles->links() !!} 
                                </div>                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</div>
@endsection