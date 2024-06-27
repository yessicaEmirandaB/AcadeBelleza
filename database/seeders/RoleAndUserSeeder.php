<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {

        $role_admin = Role::create(['name' => 'super-admin']);
        $role_supervisor = Role::create(['name' => 'supervisor']);
        $role_maestro = Role::create(['name' => 'maestro']);
        $role_alumno = Role::create(['name' => 'alumno']);


        $usuario_admin= User::create([
            'name'=>  'Admin',
            'email'=>  'admin@emil.com',
            'password'=> bcrypt('12345678910')
        ]);
       $usuario_admin->assignRole('super-admin');

       $usuario_supervisor= User::create([
          'name'=>  'Supervisor1',
          'email'=>  'supervisor1@emil.com',
          'password'=> bcrypt('12345678910')
        ]);
        $usuario_supervisor->assignRole('supervisor');

       $usuario_maestro= User::create([
         'name'=>  'Maestro1',
         'email'=>  'maestro1@emil.com',
         'password'=> bcrypt('12345678910')
        ]);
         $usuario_maestro->assignRole('maestro');

        $usuario_alumno= User::create([
            'name'=>  'Alumno1',
            'email'=>  'alumno1@emil.com',
            'password'=> bcrypt('12345678910')
        ]);
        $usuario_alumno->assignRole('alumno');
    }
}
