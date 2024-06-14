<?php
use App\Models\Maestros;
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
        Schema::create('detalle__curso__maestros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Maestros_id')
                  ->nullable()
                  ->constrained('Maestros')
                  ->nullOnDelete();

            $table->foreignId('cursos_id')
                  ->nullable()
                  ->constrained('cursos')
                  ->nullOnDelete();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle__curso__maestros');
    }
};
