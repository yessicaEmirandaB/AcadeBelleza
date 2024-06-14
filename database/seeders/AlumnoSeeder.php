<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Alumnos;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AlumnoSeeder extends Seeder
{
  
    public function run(): void
    {
         
        Alumnos::create([
            'Apellidos' => 'rojas',
            'Nombres' => 'ana',
            'CI' => '1234456',
            'Direccion' => 'las lomas',
            'Celular' => '67876545',
            'Correo' => 'ana@gmail.com',
            'Foto' => '',
            'user_id' => 5,
        ]);

       
    }
}
