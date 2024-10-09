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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // El estudiante que solicita
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade'); // Materia solicitada
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])->default('pendiente'); // Estado de la solicitud
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
