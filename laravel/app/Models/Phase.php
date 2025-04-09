<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Phase extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'progress'
    ];

    //MUTADOR SIRVE PARA CONVERTIR EL VALOR A ENTERO
    public function setProgressAttribute($value) {
        $this->attributes['progress'] = (int) $value;
    }

    protected $dates = ['start_date', 'end_date'];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}