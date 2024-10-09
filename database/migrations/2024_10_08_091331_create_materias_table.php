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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->string('semestre');
            $table->integer('cupos_minimos');
            $table->integer('cupos_maximos');
            $table->enum('estado', ['abierto', 'pendiente', 'cerrado'])->default('cerrado');
            $table->unsignedBigInteger('prerequisito_id')->nullable(); // Requisito previo
            $table->foreign('prerequisito_id')->references('id')->on('materias')->onDelete('set null'); // Relación autoreferencial
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
