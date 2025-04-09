<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'version_number',
        'changes',
        'file_path',
        'modified_by'
    ];

    public function document() {
        return $this->belongsTo(Document::class);
    }

    public function modifiedBy() {
        return $this->belongsTo(User::class);
    }
}