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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->decimal('initial_budget', 12, 2); // Presupuesto inicial (ej: 100000.00)
            $table->decimal('current_budget', 12, 2); // Presupuesto actual (se actualiza con gastos)
            $table->text('notes')->nullable(); // Notas sobre ajustes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
