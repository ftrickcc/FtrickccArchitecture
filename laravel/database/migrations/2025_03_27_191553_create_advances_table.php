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
        Schema::create('advances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->unsignedInteger('overall_progress'); // % global de avance
            $table->text('milestones'); // Hitos clave (ej: "Cimentación completada al 50%")
            $table->foreignId('updated_by')->constrained('users'); // Quién registró el avance
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advances');
    }
};
