<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'super-admin']);
        $usuario= User::create([
            'name'=>  'Administradora',
            'email'=>  'admin@emil.com',
            'password'=> bcrypt('12345678910')
        ]);
       $usuario->assignRole('super-admin');
    }
}
