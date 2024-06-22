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

            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla alumnos
            'ver-alumnos',
            'crear-alumnos',
            'editar-alumnos',
            'borrar-alumnos',
            //tabla maestros
            'ver-maestros',
            'crear-maestros',
            'editar-maestros',
            'borrar-maestros',
            //tabla cursos
            'ver-cursos',
            'crear-cursos',
            'editar-cursos',
            'borrar-cursos',
            //tabla materias
            'ver-materias',
            'crear-materias',
            'editar-materias',
            'borrar-materias',
            //tabla aulas
            'ver-aulas',
            'crear-aulas',
            'editar-aulas',
            'borrar-aulas',
            //tabla horarios
            'ver-horarios',
            'crear-horarios',
            'editar-horarios',
            'borrar-horarios',
            //tabla detalle__curso__maestros
            'ver-detalle__curso__maestros',
            'crear-detalle__curso__maestros',
            'editar-detalle__curso__maestros',
            'borrar-detalle__curso__maestros',
             //tabla duracioncursos
             'ver-duracioncursos',
             'crear-duracioncursos',
             'editar-duracioncursos',
             'borrar-duracioncursos',
             //tabla alumnoscursos
             'ver-alumnoscursos',
             'crear-alumnoscursos',
             'editar-alumnoscursos',
             'borrar-alumnoscursos',

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
