<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            //tabla roles
            'alumnos.store',
            'alumnos.index',
            'alumnos.create',
            'alumnos.update',
            'alumnos.show',
            'alumnos.destroy',
            'alumnos.edit',

            'maestros.store',
            'maestros.index',
            'maestros.create',
            'maestros.update',
            'maestros.show',
            'maestros.destroy',
            'maestros.edit',

            'usuarios.store',
            'usuarios.index',
            'usuarios.create',
            'usuarios.update',
            'usuarios.show',
            'usuarios.destroy',
            'usuarios.edit',

            'roles.store',
            'roles.index',
            'roles.create',
            'roles.update',
            'roles.show',
            'roles.destroy',
            'roles.edit',

            'permisos.store',
            'permisos.index',
            'permisos.create',
            'permisos.update',
            'permisos.show',
            'permisos.destroy',
            'permisos.edit',

            'materias.store',
            'materias.index',
            'materias.create',
            'materias.update',
            'materias.show',
            'materias.destroy',
            'materias.edit',

            'aulas.store',
            'aulas.index',
            'aulas.create',
            'aulas.update',
            'aulas.show',
            'aulas.destroy',
            'aulas.edit',

            'horarios.store',
            'horarios.index',
            'horarios.create',
            'horarios.update',
            'horarios.show',
            'horarios.destroy',
            'horarios.edit',

            'notas.store',
            'notas.index',
            'notas.create',
            'notas.update',
            'notas.show',
            'notas.destroy',
            'notas.edit',

            'alumnoscursos.store',
            'alumnoscursos.index',
            'alumnoscursos.create',
            'alumnoscursos.update',
            'alumnoscursos.show',
            'alumnoscursos.destroy',
            'alumnoscursos.edit',

            'mestrocursos.store',
            'mestrocursos.index',
            'mestrocursos.create',
            'mestrocursos.update',
            'mestrocursos.show',
            'mestrocursos.destroy',
            'mestrocursos.edit',

            'cursos.store',
            'cursos.index',
            'cursos.create',
            'cursos.update',
            'cursos.show',
            'cursos.destroy',
            'cursos.edit',

            'duracioncursos.store',
            'duracioncursos.index',
            'duracioncursos.create',
            'duracioncursos.update',
            'duracioncursos.show',
            'duracioncursos.destroy',
            'duracioncursos.edit',

            'reportes.index'

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
