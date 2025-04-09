<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'initial_budget',
        'current_budget',
        'notes',
    ];

    // Relación con Project (un presupuesto pertenece a un proyecto)
    public function project() {
        return $this->belongsTo(Project::class);
    }
}