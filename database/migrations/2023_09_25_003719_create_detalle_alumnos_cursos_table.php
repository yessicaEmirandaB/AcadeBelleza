<?php

use App\Models\Alumnos;
use App\Models\cursos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_alumnos_cursos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('Alumnos_id')
                  ->nullable()
                  ->constrained('Alumnos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
             
              $table->foreignId('cursos_id')
                  ->nullable()
                  ->constrained('cursos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_alumnos_cursos');
    }
};
