<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisionsRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //asign collective Permissions
        $role = Role::where('name', '=', 'alumno')->first();
        $permissions = Permission::where('name', 'like', 'alumnos.%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }
        $permissions = Permission::where('name', 'like', 'cursos.%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }
        $permissions = Permission::where('name', 'like', 'notas.%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }
        $permissions = Permission::where('name', 'like', 'horarios.%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }




        $role = Role::where('name', '=', 'maestro')->first();
        $permissions = Permission::where('name', 'like', 'maestro.%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }
        $permissions = Permission::where('name', 'like', 'materias.%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }
        $permissions = Permission::where('name', 'like', 'notas.%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }
        $permissions = Permission::where('name', 'like', 'alumnos.%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
