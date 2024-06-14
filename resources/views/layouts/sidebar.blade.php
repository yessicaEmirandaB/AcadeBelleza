    <div class="wrapper">
        <!-- Sidebar  -->

        <nav id="sidebar">
            <div class="user-p">
                <img src="imagenes/logo.jpg">
            </div>

            <ul class="list-unstyled components">

                <!-- Page Content  
                <li class="active">
                    <a href="/" data-bs-toggle="collapse" data-bs-target="#homeSubmenu" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>Asignacion</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">

                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>-->

                @can('ver-alumnos')
                <li class="{{'Alumno'==Request::is('Alumno*')?'active':''}}">
                    <a href="{{ route('Alumno.index')}}">
                        <i class="fa fa-graduation-cap"></i>
                        <b>Alumnos</b>
                    </a>
                </li>
                @endcan
                @can('ver-alumnos')
                <li class="{{'AlumnoCurso'==Request::is('AlumnoCurso*')?'active':''}}">
                    <a href="{{ route('AlumnoCurso.index')}}">
                        <i class="fa fa-book"></i>
                        <b>AlumnoCurso</b>
                    </a>
                </li>
                @endcan
                @can('ver-alumnos')
                <li class="{{'Maestro'==Request::is('Maestro*')?'active':''}}">
                    <a href="{{ route('Maestro.index')}}">
                        <i class='fas fa-chalkboard-teacher'></i>
                        <b>Maestros</b>
                    </a>
                </li>
                @endcan
                @can('ver-alumnos')
                <li class="{{'MaestroCurso'==Request::is('MaestroCurso*')?'active':''}}">
                    <a href="{{ route('MaestroCurso.index')}}">
                        <i class='fas fa-chalkboard-teacher'></i>
                        <b>MaestroCurso</b>
                    </a>
                </li>
                @endcan
                @can('ver-alumnos')
                <li class="{{'Curso'==Request::is('Curso*')?'active':''}}">
                    <a href="{{ route('Curso.index')}}">
                        <i class="fa fa-book"></i>
                        <b>Curso</b>
                    </a>
                </li>
                @endcan
               
                @can('ver-alumnos')
                <li class="{{'Materia'==Request::is('Materia*')?'active':''}}">
                    <a href="{{ route('Materia.index')}}">
                        <i class="fa fa-book"></i>
                        <b>Materias</b>
                    </a>
                </li>
                @endcan
                @can('ver-alumnos')
                <li class="{{'Aula'==Request::is('Aula*')?'active':''}}">
                    <a href="{{ route('Aula.index')}}">
                        <i class="fa fa-book"></i>
                        <b>Aulas</b>
                    </a>
                </li>
                @endcan
                @can('ver-alumnos')
                <li class="{{'Horario'==Request::is('Horario*')?'active':''}}">
                    <a href="{{ route('Horario.index')}}">
                        <i class="fa fa-book"></i>
                        <b>Horario</b>
                    </a>
                </li>
                @endcan
                @can('ver-alumnos')
                <li class="nav-link">
                    <a href="/" data-bs-toggle="collapse" data-bs-target="#homeSubmenu" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>ADMINISTRACIÓN</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        @can('ver-alumnos')
                        <li class="{{'usuarios'==Request::is('usuarios*')?'active':''}}">
                            <a href="{{ route('usuarios.index')}}">
                                <i class="fa fa-users"></i>
                                <b>Permisos</b>
                            </a>
                        </li>
                        @endcan
                        @can('ver-alumnos')
                        <li class="{{'roles'==Request::is('roles*')?'active':''}}">
                            <a href="{{ route('roles.index')}}">
                                <i class="fa fa-users"></i>
                                <b>Roles</b>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

            </ul>
        </nav>

        <!-- Page Content  -->
        <!--<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>
        </div>-->
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>