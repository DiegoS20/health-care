<?php

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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('idPaciente');
            $table->string (column: 'nombres', length: 255);
            $table->string (column: 'apellidos', length: 255);
            $table->string (column: 'telefono', length: 8);
            $table->date(column: 'fecha_nacimiento');
            $table->enum (column: 'sexo', allowed: ['H', 'M']);
            $table->string (column: 'codigo', length: 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
