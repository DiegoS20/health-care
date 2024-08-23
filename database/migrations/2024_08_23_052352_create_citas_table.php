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
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('idCita');
            $table->unsignedInteger(column: 'idPaciente');
            $table->date(column: 'fecha');
            $table->text(column: 'notas')->nullable();
            $table->timestamps();

            $table->foreign('idPaciente')->references('idPaciente')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
