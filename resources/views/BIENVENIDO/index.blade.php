@extends('layouts.app')
@section('content')
<section class="content" style=" margin= 20 px">
    <h1>PAGINA PRINCIPAL</h1>
    <br>
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        @can('ver-usuarios')
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
                <h3>1</h3>
                <p>USUARIOS</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('usuarios.index')}}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          @endcan
        </div>
        <!-- ./col -->
        @can('ver-alumnos')
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>1</h3>
              <p>ALUMNOS</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('alumnos.index')}}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endcan
        <!-- ./col -->
        @can('ver-maestros')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  <h3>1</h3>
                  <p>MAESTROS</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('maestros.index')}}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endcan
        <!-- ./col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection
