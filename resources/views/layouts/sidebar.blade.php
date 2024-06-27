    <div class="wrapper">
        <!-- Sidebar  -->

        <nav id="sidebar">
            <div class="user-p">
                <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo">
            </div>
            <ul class="list-unstyled components">
                @can('roles.index')
                <li class="{{'BIENVENIDO'==Request::is('BIENVENIDO*')?'active':''}}">
                    <a href="{{ route('BIENVENIDO.index')}}">
                        <i class="fa fa-graduation-cap"></i>
                        <b>BIENVENIDO</b>
                    </a>
                </li>
                @endcan
                @can('alumnos.index')
                <li>
                    <a href="/" data-bs-toggle="collapse" data-bs-target="#homeSubmenuInscripcion" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>INSCRIPCIÓN</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenuInscripcion">
                        @can('alumnos.index')
                        <li class="{{'Alumno'==Request::is('Alumno*')?'active':''}}">
                            <a href="{{ route('alumnos.index')}}">
                                <i class="fa fa-graduation-cap"></i>
                                <b>Alumnos</b>
                            </a>
                        </li>
                        @endcan
                        @can('alumnoscursos.index')
                        <li class="{{'alumnoscursos'==Request::is('AlumnoCurso*')?'active':''}}">
                            <a href="{{ route('alumnoscursos.index')}}">
                                <i class="fa fa-book"></i>
                                <b>AlumnoCurso</b>
                            </a>
                        </li>
                        @endcan
                        @can('horarios.index')
                        <li class="{{'horarios'==Request::is('Horario*')?'active':''}}">
                            <a href="{{ route('horarios.index')}}">
                                <i class="fa fa-book"></i>
                                <b>Horario</b>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('alumnos.index')
                <li>
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#homeSubmenuParametro" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>PARAMETRO</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenuParametro">
                        @can('alumnos.index')
                        <li class="{{'Alumno'==Request::is('Alumno*')?'active':''}}">
                            <a href="{{ route('alumnos.index')}}">
                                <i class="fa fa-graduation-cap"></i>
                                <b>Alumnos</b>
                            </a>
                        </li>
                        @endcan
                        @can('alumnoscursos.index')
                        <li class="{{'alumnoscursos'==Request::is('AlumnoCurso*')?'active':''}}">
                            <a href="{{ route('alumnoscursos.index')}}">
                                <i class="fa fa-book"></i>
                                <b>AlumnoCurso</b>
                            </a>
                        </li>
                        @endcan
                        @can('maestros.index')
                        <li class="{{'Maestro'==Request::is('Maestro*')?'active':''}}">
                            <a href="{{ route('maestros.index')}}">
                                <i class='fas fa-chalkboard-teacher'></i>
                                <b>Maestros</b>
                            </a>
                        </li>
                        @endcan
                        @can('mestrocursos.index')
                        <li class="{{'MaestroCurso'==Request::is('MaestroCurso*')?'active':''}}">
                            <a href="{{ route('mestrocursos.index')}}">
                                <i class='fas fa-chalkboard-teacher'></i>
                                <b>MaestroCurso</b>
                            </a>
                        </li>
                        @endcan
                        @can('cursos.index')
                        <li class="{{'Curso'==Request::is('Curso*')?'active':''}}">
                            <a href="{{ route('cursos.index')}}">
                                <i class="fa fa-book"></i>
                                <b>Curso</b>
                            </a>
                        </li>
                        @endcan
                        @can('materias.index')
                        <li class="{{'Materia'==Request::is('Materia*')?'active':''}}">
                            <a href="{{ route('materias.index')}}">
                                <i class="fa fa-book"></i>
                                <b>Materias</b>
                            </a>
                        </li>
                        @endcan
                        @can('duracioncursos.index')
                        <li class="{{'DuracionCurso'==Request::is('DuracionCurso*')?'active':''}}">
                            <a href="{{ route('duracioncursos.index')}}">
                                <i class="fa fa-book"></i>
                                <b>Duración Cursos</b>
                            </a>
                        </li>
                        @endcan
                        @can('aulas.index')
                        <li class="{{'Aula'==Request::is('Aula*')?'active':''}}">
                            <a href="{{ route('aulas.index')}}">
                                <i class="fa fa-book"></i>
                                <b>Aulas</b>
                            </a>
                        </li>
                        @endcan
                        @can('horarios.index')
                        <li class="{{'Horario'==Request::is('Horario*')?'active':''}}">
                            <a href="{{ route('horarios.index')}}">
                                <i class="fa fa-book"></i>
                                <b>Horario</b>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('roles.index')
                <li>
                    <a href="/" data-bs-toggle="collapse" data-bs-target="#homeSubmenuAdministracion" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>ADMINISTRACIÓN</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenuAdministracion">
                        @can('permisos.index')
                        <li class="{{'permisos'==Request::is('permisos*')?'active':''}}">
                            <a href="{{ route('permisos.index')}}">
                                <i class="fa fa-users"></i>
                                <b>Permisos</b>
                            </a>
                        </li>
                        @endcan
                        @can('roles.index')
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
                {{-- @can('ver-alumnos')
                <li class="{{'Aula'==Request::is('Aula*')?'active':''}}">
                    <a href="{{ route('aulas.index')}}">
                        <i class="fa fa-book"></i>
                        <b>PAGOS</b>
                    </a>
                </li>
                @endcan --}}
                @can('reporte.index')
                <li>
                    <a href="/" data-bs-toggle="collapse" data-bs-target="#homeSubmenuReporte" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <b>REPORTE</b>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenuReporte">
                        {{-- @can('ver-alumnos') --}}
                        <li class="{{'Alumno'==Request::is('Alumno*')?'active':''}}">
                            <a href="{{ route('Alumno.pdf') }}" target="_blank">
                                <i class="fa fa-graduation-cap"></i>
                                <b>Alumnos</b>
                            </a>
                        </li>
                        {{-- @endcan --}}
                        {{-- @can('ver-alumnos') --}}
                        <li class="{{'Curso'==Request::is('Curso*')?'active':''}}">
                            <a href="{{ route('Curso.pdf')}}"  target="_blank">
                                <i class="fa fa-book"></i>
                                <b>Curso</b>
                            </a>
                        </li>
                        {{-- @endcan --}}
                        {{-- @can('ver-alumnos') --}}
                        <li class="{{'Maestro'==Request::is('Maestro*')?'active':''}}">
                            <a href="{{ route('Maestro.pdf')}}" target="_blank">
                                <i class='fas fa-chalkboard-teacher'></i>
                                <b>Maestros</b>
                            </a>
                        </li>
                        {{-- @endcan --}}
                        {{-- @can('ver-alumnos') --}}
                        <li class="{{'Materia'==Request::is('Materia*')?'active':''}}">
                            <a href="{{ route('Materia.pdf')}}" target="_blank">
                                <i class="fa fa-book"></i>
                                <b>Materias</b>
                            </a>
                        </li>
                        {{-- @endcan --}}
                        {{-- @can('ver-alumnos') --}}
                        <li class="{{'Horario'==Request::is('Horario*')?'active':''}}">
                            <a href="{{ route('Horario.pdf')}}" target="_blank">
                                <i class="fa fa-book"></i>
                                <b>Horario</b>
                            </a>
                        </li>
                        {{-- @endcan --}}
                    </ul>
                </li>
                @endcan

            </ul>
        </nav>
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
