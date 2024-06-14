<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $curso=['Maquillaje profesional','Auto Maquillaje','Peinados'];
        foreach($curso as $cursos){
            DB::table('cursos')->insert([
                'nombrecurso'=>$cursos
            ]);
        } 
    }
}
