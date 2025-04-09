<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'project_id',
        'status',
        'general_description'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function documents() {
        return $this->hasMany(Document::class);
    }
}