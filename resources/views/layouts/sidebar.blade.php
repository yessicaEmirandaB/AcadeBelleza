    <div class="wrapper">
        <!-- Sidebar  -->

        <nav id="sidebar">
            <div class="user-p">
                <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo">
            </div>

            <ul class="list-unstyled components">
                @can('ver-alumnos')
                <li class="{{'BIENVENIDO'==Request::is('BIENVENIDO*')?'active':''}}">
                    <a href="{{ route('BIENVENIDO.index')}}">
                        <i class="fa fa-graduation-cap"></i>
                        <b>BIENVENIDO</b>
                    </a>
                </li>
                @endcan
                @can('ver-alumnos')
                <li>
                    <a href="/" data-bs-toggle="collapse" data-bs-target="#homeSubmenuInscripcion" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>INSCRIPCIÓN</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenuInscripcion">
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
                        <li class="{{'Horario'==Request::is('Horario*')?'active':''}}">
                            <a href="{{ route('Horario.index')}}">
                                <i class="fa fa-book"></i>
                                <b>Horario</b>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('ver-alumnos')
                <li>
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#homeSubmenuParametro" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>PARAMETRO</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenuParametro">
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
                        <li class="{{'DuracionCurso'==Request::is('DuracionCurso*')?'active':''}}">
                            <a href="{{ route('DuracionCurso.index')}}">
                                <i class="fa fa-book"></i>
                                <b>Duración Cursos</b>
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
                    </ul>
                </li>
                @endcan
               
                @can('ver-alumnos')
                <li>
                    <a href="/" data-bs-toggle="collapse" data-bs-target="#homeSubmenuAdministracion" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>ADMINISTRACIÓN</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenuAdministracion">
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
                @can('ver-alumnos')
                <li class="{{'Aula'==Request::is('Aula*')?'active':''}}">
                    <a href="{{ route('Aula.index')}}">
                        <i class="fa fa-book"></i>
                        <b>PAGOS</b>
                    </a>
                </li>
                @endcan
                @can('ver-alumnos')
                <li>
                    <a href="/" data-bs-toggle="collapse" data-bs-target="#homeSubmenuReporte" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>REPORTE</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenuReporte">
                        @can('ver-alumnos')
                        <li class="{{'Alumno'==Request::is('Alumno*')?'active':''}}">
                            <a href="{{ route('Alumno.pdf') }}" target="_blank">
                                <i class="fa fa-graduation-cap"></i>
                                <b>Alumnos</b>
                            </a>
                        </li>
                        @endcan
                        @can('ver-alumnos')
                        <li class="{{'Curso'==Request::is('Curso*')?'active':''}}">
                            <a href="{{ route('Curso.pdf')}}"  target="_blank">
                                <i class="fa fa-book"></i>
                                <b>Curso</b>
                            </a>
                        </li>
                        @endcan
                        @can('ver-alumnos')
                        <li class="{{'Maestro'==Request::is('Maestro*')?'active':''}}">
                            <a href="{{ route('Maestro.pdf')}}" target="_blank">
                                <i class='fas fa-chalkboard-teacher'></i>
                                <b>Maestros</b>
                            </a>
                        </li>
                        @endcan
                        @can('ver-alumnos')
                        <li class="{{'Materia'==Request::is('Materia*')?'active':''}}">
                            <a href="{{ route('Materia.pdf')}}" target="_blank">
                                <i class="fa fa-book"></i>
                                <b>Materias</b>
                            </a>
                        </li>
                        @endcan
                        @can('ver-alumnos')
                        <li class="{{'Horario'==Request::is('Horario*')?'active':''}}">
                            <a href="{{ route('Horario.pdf')}}" target="_blank">
                                <i class="fa fa-book"></i>
                                <b>Horario</b>
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