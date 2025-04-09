<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'overall_progress',
        'milestones',
        'updated_by'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}