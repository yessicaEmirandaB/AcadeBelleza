<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AlumnoscursosController as ControllersAlumnoscursosController;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\DetalleCursoMaestroController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\DuracioncursosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BienvenidosController;

//Agregamos los controladores para roles y permisos
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoControllerController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Auth::routes();
Route::get('/home', [BienvenidosController::class, 'index'])->name('home');
Route::resource('/BIENVENIDO', BienvenidosController::class)->middleware('auth');
//RUTAS DEl FRONT-END
Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('/Cursos',[IndexController::class,'cursos'])->name('Cursos');
Route::get('/QuienesSomos',[IndexController::class,'quienessomos'])->name('QuienesSomos');
Route::get('/Contacto',[IndexController::class,'contacto'])->name('Contacto');
Route::get('/Perfil',[IndexController::class,'perfil'])->name('Perfil');

//Pdf
Route::get('Alumno/pdf',[AlumnosController::class, 'pdf'] )->name('Alumno.pdf');
Route::get('Curso/pdf',[CursosController::class, 'pdf'] )->name('Curso.pdf');
Route::get('Maestro/pdf',[MaestrosController::class, 'pdf'] )->name('Maestro.pdf');
Route::get('Materia/pdf',[MateriasController::class, 'pdf'] )->name('Materia.pdf');
Route::get('Horario/pdf',[HorariosController::class, 'pdf'] )->name('Horario.pdf');


Route::middleware(['auth'])->group(function(){

//Alumno
    Route::get('alumnos/store' , [AlumnosController::class, 'store'])->name('alumnos.store')
    ->middleware(middleware:'permission:alumnos.store');

    Route::get('alumnos' , [AlumnosController::class, 'index'])->name('alumnos.index')
    ->middleware(middleware:'permission:alumnos.index');

    Route::get('alumnos/create' , [AlumnosController::class, 'create'])->name('alumnos.create')
    ->middleware(middleware:'permission:alumnos.create');

    Route::get('alumnos/{alumno}' , [AlumnosController::class, 'update'])->name('alumnos.update')
    ->middleware(middleware:'permission:alumnos.update');

    Route::get('alumnos/{alumno}' , [AlumnosController::class, 'create'])->name('alumnos.show')
    ->middleware(middleware:'permission:alumnos.show');

    Route::get('alumnos/{alumno}' , [AlumnosController::class, 'destroy'])->name('alumnos.destroy')
    ->middleware(middleware:'permission:alumnos.destroy');

    Route::get('alumnos/{alumno}/edit' , [AlumnosController::class, 'edit'])->name('alumnos.edit')
    ->middleware(middleware:'permission:alumnos.edit');

//Maestro
    Route::get('maestros/store' , [MaestrosController::class, 'store'])->name('maestros.store')
    ->middleware(middleware:'permission:maestros.store');

    Route::get('maestros' , [MaestrosController::class, 'index'])->name('maestros.index')
    ->middleware(middleware:'permission:maestros.index');

    Route::get('maestros/create' , [MaestrosController::class, 'create'])->name('maestros.create')
    ->middleware(middleware:'permission:maestros.create');

    Route::get('maestros/{alumno}' , [MaestrosController::class, 'update'])->name('maestros.update')
    ->middleware(middleware:'permission:maestros.update');

    Route::get('maestros/{alumno}' , [MaestrosController::class, 'create'])->name('maestros.show')
    ->middleware(middleware:'permission:maestros.show');

    Route::get('maestros/{alumno}' , [MaestrosController::class, 'destroy'])->name('maestros.destroy')
    ->middleware(middleware:'permission:maestros.destroy');

    Route::get('maestros/{alumno}/edit' , [MaestrosController::class, 'edit'])->name('maestros.edit')
    ->middleware(middleware:'permission:maestros.edit');

//Usuario
     Route::get('usuarios/store' , [UsuarioController::class, 'store'])->name('usuarios.store')
     ->middleware(middleware:'permission:usuarios.store');

     Route::get('usuarios' , [UsuarioController::class, 'index'])->name('usuarios.index')
     ->middleware(middleware:'permission:usuarios.index');

     Route::get('usuarios/create' , [UsuarioController::class, 'create'])->name('usuarios.create')
     ->middleware(middleware:'permission:usuarios.create');

     Route::get('usuarios/{alumno}' , [UsuarioController::class, 'update'])->name('usuarios.update')
     ->middleware(middleware:'permission:usuarios.update');

     Route::get('usuarios/{alumno}' , [UsuarioController::class, 'create'])->name('usuarios.show')
     ->middleware(middleware:'permission:usuarios.show');

     Route::get('usuarios/{alumno}' , [UsuarioController::class, 'destroy'])->name('usuarios.destroy')
     ->middleware(middleware:'permission:usuarios.destroy');

     Route::get('usuarios/{alumno}/edit' , [UsuarioController::class, 'edit'])->name('usuarios.edit')
     ->middleware(middleware:'permission:usuarios.edit');

//Roles
     Route::get('roles/store' , [RolController::class, 'store'])->name('roles.store')
     ->middleware(middleware:'permission:roles.store');

     Route::get('roles' , [RolController::class, 'index'])->name('roles.index')
     ->middleware(middleware:'permission:roles.index');

     Route::get('roles/create' , [RolController::class, 'create'])->name('roles.create')
     ->middleware(middleware:'permission:roles.create');

     Route::get('roles/{alumno}' , [RolController::class, 'update'])->name('roles.update')
     ->middleware(middleware:'permission:roles.update');

     Route::get('roles/{alumno}' , [RolController::class, 'create'])->name('roles.show')
     ->middleware(middleware:'permission:roles.show');

     Route::get('roles/{alumno}' , [RolController::class, 'destroy'])->name('roles.destroy')
     ->middleware(middleware:'permission:roles.destroy');

     Route::get('roles/{alumno}/edit' , [RolController::class, 'edit'])->name('roles.edit')
     ->middleware(middleware:'permission:roles.edit');

//Permisos
    Route::get('permisos/store' , [PermisoControllerController::class, 'store'])->name('permisos.store')
    ->middleware(middleware:'permission:permisos.store');

    Route::get('permisos' , [PermisoControllerController::class, 'index'])->name('permisos.index')
    ->middleware(middleware:'permission:permisos.index');

    Route::get('permisos/create' , [PermisoControllerController::class, 'create'])->name('permisos.create')
    ->middleware(middleware:'permission:permisos.create');

    Route::get('permisos/{alumno}' , [PermisoControllerController::class, 'update'])->name('permisos.update')
    ->middleware(middleware:'permission:permisos.update');

    Route::get('permisos/{alumno}' , [PermisoControllerController::class, 'create'])->name('permisos.show')
    ->middleware(middleware:'permission:permisos.show');

    Route::get('permisos/{alumno}' , [PermisoControllerController::class, 'destroy'])->name('permisos.destroy')
    ->middleware(middleware:'permission:permisos.destroy');

    Route::get('permisos/{alumno}/edit' , [PermisoControllerController::class, 'edit'])->name('permisos.edit')
    ->middleware(middleware:'permission:permisos.edit');

//Materias
    Route::get('materias/store' , [MateriasController::class, 'store'])->name('materias.store')
    ->middleware(middleware:'permission:materias.store');

    Route::get('materias' , [MateriasController::class, 'index'])->name('materias.index')
    ->middleware(middleware:'permission:materias.index');

    Route::get('materias/create' , [MateriasController::class, 'create'])->name('materias.create')
    ->middleware(middleware:'permission:materias.create');

    Route::get('materias/{alumno}' , [MateriasController::class, 'update'])->name('materias.update')
    ->middleware(middleware:'permission:materias.update');

    Route::get('materias/{alumno}' , [MateriasController::class, 'create'])->name('materias.show')
    ->middleware(middleware:'permission:materias.show');

    Route::get('materias/{alumno}' , [MateriasController::class, 'destroy'])->name('materias.destroy')
    ->middleware(middleware:'permission:materias.destroy');

    Route::get('materias/{alumno}/edit' , [MateriasController::class, 'edit'])->name('materias.edit')
    ->middleware(middleware:'permission:materias.edit');

//Aulas
    Route::get('aulas/store' , [AulasController::class, 'store'])->name('aulas.store')
    ->middleware(middleware:'permission:aulas.store');

    Route::get('aulas' , [AulasController::class, 'index'])->name('aulas.index')
    ->middleware(middleware:'permission:aulas.index');

    Route::get('aulas/create' , [AulasController::class, 'create'])->name('aulas.create')
    ->middleware(middleware:'permission:aulas.create');

    Route::get('aulas/{alumno}' , [AulasController::class, 'update'])->name('aulas.update')
    ->middleware(middleware:'permission:aulas.update');

    Route::get('aulas/{alumno}' , [AulasController::class, 'create'])->name('aulas.show')
    ->middleware(middleware:'permission:aulas.show');

    Route::get('aulas/{alumno}' , [AulasController::class, 'destroy'])->name('aulas.destroy')
    ->middleware(middleware:'permission:aulas.destroy');

    Route::get('aulas/{alumno}/edit' , [AulasController::class, 'edit'])->name('aulas.edit')
    ->middleware(middleware:'permission:aulas.edit');

//Horarios
    Route::get('horarios/store' , [HorariosController::class, 'store'])->name('horarios.store')
    ->middleware(middleware:'permission:horarios.store');

    Route::get('horarios' , [HorariosController::class, 'index'])->name('horarios.index')
    ->middleware(middleware:'permission:horarios.index');

    Route::get('horarios/create' , [HorariosController::class, 'create'])->name('horarios.create')
    ->middleware(middleware:'permission:horarios.create');

    Route::get('horarios/{alumno}' , [HorariosController::class, 'update'])->name('horarios.update')
    ->middleware(middleware:'permission:horarios.update');

    Route::get('horarios/{alumno}' , [HorariosController::class, 'create'])->name('horarios.show')
    ->middleware(middleware:'permission:horarios.show');

    Route::get('horarios/{alumno}' , [HorariosController::class, 'destroy'])->name('horarios.destroy')
    ->middleware(middleware:'permission:horarios.destroy');

    Route::get('horarios/{alumno}/edit' , [HorariosController::class, 'edit'])->name('horarios.edit')
    ->middleware(middleware:'permission:horarios.edit');

//Notas
    Route::get('notas/store' , [HorariosController::class, 'store'])->name('notas.store')
    ->middleware(middleware:'permission:notas.store');

    Route::get('notas' , [HorariosController::class, 'index'])->name('notas.index')
    ->middleware(middleware:'permission:notas.index');

    Route::get('notas/create' , [HorariosController::class, 'create'])->name('notas.create')
    ->middleware(middleware:'permission:notas.create');

    Route::get('notas/{alumno}' , [HorariosController::class, 'update'])->name('notas.update')
    ->middleware(middleware:'permission:notas.update');

    Route::get('notas/{alumno}' , [HorariosController::class, 'create'])->name('notas.show')
    ->middleware(middleware:'permission:notas.show');

    Route::get('notas/{alumno}' , [HorariosController::class, 'destroy'])->name('notas.destroy')
    ->middleware(middleware:'permission:notas.destroy');

    Route::get('notas/{alumno}/edit' , [HorariosController::class, 'edit'])->name('notas.edit')
    ->middleware(middleware:'permission:notas.edit');

//Alumnos Cursos
  Route::get('alumnoscursos/store' , [ControllersAlumnoscursosController::class, 'store'])->name('alumnoscursos.store')
  ->middleware(middleware:'permission:alumnoscursos.store');

  Route::get('alumnoscursos' , [ControllersAlumnoscursosController::class, 'index'])->name('alumnoscursos.index')
  ->middleware(middleware:'permission:alumnoscursos.index');

  Route::get('alumnoscursos/create' , [ControllersAlumnoscursosController::class, 'create'])->name('alumnoscursos.create')
  ->middleware(middleware:'permission:alumnoscursos.create');

  Route::get('alumnoscursos/{alumno}' , [ControllersAlumnoscursosController::class, 'update'])->name('alumnoscursos.update')
  ->middleware(middleware:'permission:alumnoscursos.update');

  Route::get('alumnoscursos/{alumno}' , [ControllersAlumnoscursosController::class, 'create'])->name('alumnoscursos.show')
  ->middleware(middleware:'permission:alumnoscursos.show');

  Route::get('alumnoscursos/{alumno}' , [ControllersAlumnoscursosController::class, 'destroy'])->name('alumnoscursos.destroy')
  ->middleware(middleware:'permission:alumnoscursos.destroy');

  Route::get('alumnoscursos/{alumno}/edit' , [ControllersAlumnoscursosController::class, 'edit'])->name('alumnoscursos.edit')
  ->middleware(middleware:'permission:alumnoscursos.edit');


//Mestros Cursos
  Route::get('mestrocursos/store' , [DetalleCursoMaestroController::class, 'store'])->name('mestrocursos.store')
  ->middleware(middleware:'permission:mestrocursos.store');

  Route::get('mestrocursos' , [DetalleCursoMaestroController::class, 'index'])->name('mestrocursos.index')
  ->middleware(middleware:'permission:mestrocursos.index');

  Route::get('mestrocursos/create' , [DetalleCursoMaestroController::class, 'create'])->name('mestrocursos.create')
  ->middleware(middleware:'permission:mestrocursos.create');

  Route::get('mestrocursos/{alumno}' , [DetalleCursoMaestroController::class, 'update'])->name('mestrocursos.update')
  ->middleware(middleware:'permission:mestrocursos.update');

  Route::get('mestrocursos/{alumno}' , [DetalleCursoMaestroController::class, 'create'])->name('mestrocursos.show')
  ->middleware(middleware:'permission:mestrocursos.show');

  Route::get('mestrocursos/{alumno}' , [DetalleCursoMaestroController::class, 'destroy'])->name('mestrocursos.destroy')
  ->middleware(middleware:'permission:mestrocursos.destroy');

  Route::get('mestrocursos/{alumno}/edit' , [DetalleCursoMaestroController::class, 'edit'])->name('mestrocursos.edit')
  ->middleware(middleware:'permission:mestrocursos.edit');

//Cursos
    Route::get('cursos/store' , [CursosController::class, 'store'])->name('cursos.store')
    ->middleware(middleware:'permission:cursos.store');

    Route::get('cursos' , [CursosController::class, 'index'])->name('cursos.index')
    ->middleware(middleware:'permission:cursos.index');

    Route::get('cursos/create' , [CursosController::class, 'create'])->name('cursos.create')
    ->middleware(middleware:'permission:cursos.create');

    Route::get('cursos/{alumno}' , [CursosController::class, 'update'])->name('cursos.update')
    ->middleware(middleware:'permission:cursos.update');

    Route::get('cursos/{alumno}' , [CursosController::class, 'create'])->name('cursos.show')
    ->middleware(middleware:'permission:cursos.show');

    Route::get('cursos/{alumno}' , [CursosController::class, 'destroy'])->name('cursos.destroy')
    ->middleware(middleware:'permission:cursos.destroy');

    Route::get('cursos/{alumno}/edit' , [CursosController::class, 'edit'])->name('cursos.edit')
    ->middleware(middleware:'permission:cursos.edit');

//Duracion Curso
    Route::get('duracioncursos/store' , [DuracioncursosController::class, 'store'])->name('duracioncursos.store')
    ->middleware(middleware:'permission:duracioncursos.store');

    Route::get('duracioncursos' , [DuracioncursosController::class, 'index'])->name('duracioncursos.index')
    ->middleware(middleware:'permission:duracioncursos.index');

    Route::get('duracioncursos/create' , [DuracioncursosController::class, 'create'])->name('duracioncursos.create')
    ->middleware(middleware:'permission:duracioncursos.create');

    Route::get('duracioncursos/{alumno}' , [DuracioncursosController::class, 'update'])->name('duracioncursos.update')
    ->middleware(middleware:'permission:duracioncursos.update');

    Route::get('duracioncursos/{alumno}' , [DuracioncursosController::class, 'create'])->name('duracioncursos.show')
    ->middleware(middleware:'permission:duracioncursos.show');

    Route::get('duracioncursos/{alumno}' , [DuracioncursosController::class, 'destroy'])->name('duracioncursos.destroy')
    ->middleware(middleware:'permission:duracioncursos.destroy');

    Route::get('duracioncursos/{alumno}/edit' , [DuracioncursosController::class, 'edit'])->name('duracioncursos.edit')
    ->middleware(middleware:'permission:duracioncursos.edit');

});

// Route::get('/', function () {
// return view('Plantilla.Menu');
// });
/*
Route::get('Alumno/pdf',[AlumnosController::class, 'pdf'] )->name('Alumno.pdf');
Route::group(['middleware'=> ['auth']],function(){
    Route::resource('roles',RolController::class);
    Route::resource('permisos',PermisoControllerController::class);
    Route::resource('usuarios',UsuarioController::class);
    Route::resource('Alumno', AlumnosController::class);
});

/////fin PARA ROLES Y PERMISOS

// Route::get('/Alumno/create',[AlumnosController::class,'create']);
Auth::routes();

Route::get('/home', [BienvenidosController::class, 'index'])->name('home');

Route::resource('/BIENVENIDO', BienvenidosController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

// Route::resource('/Alumno', AlumnosController::class);
// Route::get('AlumnoCurso/pdf',[ControllersAlumnoscursosController::class, 'pdf'] )->name('AlumnoCurso.pdf');
// Route::resource('/AlumnoCurso', ControllersAlumnoscursosController::class);
Route::get('MaestroCurso/pdf',[DetalleCursoMaestroController::class, 'pdf'] )->name('MaestroCurso.pdf');
Route::resource('/MaestroCurso', DetalleCursoMaestroController::class);
Route::get('Maestro/pdf',[MaestrosController::class, 'pdf'] )->name('Maestro.pdf');
Route::resource('/Maestro', MaestrosController::class);
Route::get('Curso/pdf',[CursosController::class, 'pdf'] )->name('Curso.pdf');
Route::resource('/Curso', CursosController::class);
Route::get('Materia/pdf',[MateriasController::class, 'pdf'] )->name('Materia.pdf');
Route::resource('/Materia', MateriasController::class);
Route::get('Horario/pdf',[HorariosController::class, 'pdf'] )->name('Horario.pdf');
Route::resource('/Horario', HorariosController::class);
Route::resource('/Aula', AulasController::class);
Route::get('DuracionCurso/pdf',[DuracioncursosController::class, 'pdf'] )->name('DuracionCurso.pdf');
Route::resource('/DuracionCurso', DuracioncursosController::class);
Route::resource('/BIENVENIDO', BienvenidosController::class);




//RUTAS DE MAS INFORMACION DE LOS CURSOS
Route::get('/CursodeMaquillajeProfesional',[IndexController::class,'MaquillajeProfesional'])->name('CursodeMaquillajeProfesional');
Route::get('/CursodeAutomaquillaje',[IndexController::class,'Automaquillaje'])->name('CursodeAutomaquillaje');
Route::get('/CursodePeinados',[IndexController::class,'Peinados'])->name('CursodePeinados');
Route::get('/CursodePlanchado',[IndexController::class,'Planchado'])->name('CursodePlanchado');
//FIN DE RUTAS DE MAS INFORMACION DE LOS CURSOS
*/

Route::get('/prueba', function () {
    $role = Role::where('name', '=', 'alumno')->first();
    $permissions = Permission::where('name', 'like', 'cursos.%')->get();
   dd($permissions);
    // foreach ($permissions as $key => $permission) {
    //     $role->givePermissionTo($permission);
    // }
});





