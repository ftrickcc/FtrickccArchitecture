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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Ej: "PROY-2023-001" (Identificador único)
            $table->string('name');
            $table->text('description')->nullable(); // Descripción detallada
            $table->string('location')->nullable(); // Ubicación física del proyecto
            $table->date('start_date'); // Fecha de inicio
            $table->date('end_date'); // Fecha estimada de finalización
            $table->enum('status', ['planning', 'in_progress', 'paused', 'completed', 'canceled']);
            $table->foreignId('responsible_id')->constrained('users'); // Encargado principal
            $table->timestamps();
            $table->softDeletes(); // Para eliminación lógica
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
