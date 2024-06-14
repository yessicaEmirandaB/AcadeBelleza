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

        $role = Role::create(['name' => 'supervisor']);
        $usuario= User::create([
            'name'=>  'supervisor1',
            'email'=>  'supervisor1@emil.com',
            'password'=> bcrypt('123456789'),
        ]);
       $usuario->assignRole('supervisor');


        // $role = Role::where('name', '=', 'supervisor')->first();
        $permissions = Permission::where('name', 'like', '%alumnos%')->get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission);
        }

    }
}
