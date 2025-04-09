<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'technical_file_id',
        'section_id',
        'title',
        'file_type',
        'file_path',
        'is_reviewed',
        'reviewed_by'
    ];

    public function technicalFile() {
        return $this->belongsTo(File::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function versions() {
        return $this->hasMany(Version::class);
    }

    public function reviewedBy() {
        return $this->belongsTo(User::class);
    }
}