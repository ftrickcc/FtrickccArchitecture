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
        Schema::create('versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('documents')->cascadeOnDelete(); // Relación con el documento
            $table->string('version_number')->default('v1.0'); // Ej: "v1.2", "v2.0"
            $table->text('changes')->nullable(); // Descripción de cambios (ej: "Actualización de costos unitarios")
            $table->string('file_path'); // Ruta del archivo de esta versión (Word, Excel, PDF, etc.)
            $table->foreignId('modified_by')->constrained('users'); // Usuario que modificó
            $table->timestamp('version_date')->useCurrent(); // Fecha de creación de la versión
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versions');
    }
};
