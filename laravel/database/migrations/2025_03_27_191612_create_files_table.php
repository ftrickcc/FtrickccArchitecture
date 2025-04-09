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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Ej: "ET-2024-001"
            $table->string('name'); // Ej: "AGUA Y DESAGUE"
            $table->foreignId('project_id')->nullable()->constrained('projects');
            $table->date('creation_date');
            $table->enum('status', ['En elaboración', 'Revisión', 'Aprobado', 'Archivado']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
