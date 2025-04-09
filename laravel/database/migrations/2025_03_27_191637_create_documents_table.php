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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technical_file_id')->constrained('files');
            $table->foreignId('section_id')->constrained('sections'); // Parte específica (1-14)
            $table->string('title'); // Ej: "3.1 ESTUDIO TOPOGRAFICO.docx"
            $table->enum('file_type', ['word', 'excel', 'pdf', 'mpp', 'dwg', 'otros']);
            $table->string('file_path');
            $table->boolean('is_reviewed')->default(false); // ✅ Botón de revisión
            $table->foreignId('reviewed_by')->nullable()->constrained('users');
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
