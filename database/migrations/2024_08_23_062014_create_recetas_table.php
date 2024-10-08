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
        Schema::create('recetas', function (Blueprint $table) {
            $table->increments('idReceta');
            $table->unsignedInteger('idMedicina');
            $table->unsignedInteger('idCita');
            $table->integer('cantidad');
            $table->text('nota');

            $table->timestamps();

            $table->foreign('idMedicina')->references('idMedicina')->on('medicinas');
            $table->foreign('idCita')->references('idCita')->on('citas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
