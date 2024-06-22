<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'alumnos']);
        $usuario= User::create([
            'name'=>  'alumno',
            'email'=>  'alumno@emil.com',
            'password'=> bcrypt('123456789'),
        ]);
       $usuario->assignRole('alumnos');


        // $role = Role::where('name', '=', 'supervisor')->first();
        $permissions = Permission::where('name', 'like', '%alumnos%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }

    }
}
