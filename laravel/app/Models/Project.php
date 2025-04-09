<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\StatusEnum;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 
        'name',
        'description',
        'location',
        'start_date',
        'end_date',
        'status',
        'responsible_id'
    ];


    protected $dates = ['start_date', 'end_date'];

    // Relación con User (encargado principal)
    public function responsible() {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    // Relación con Phase (fases del proyecto)
    public function phases() {
        return $this->hasMany(Phase::class);
    }

    // Relación con Team (equipo del proyecto)
    public function team() {
        return $this->hasMany(Team::class);
    }

    // Relación con Progress (avance del proyecto)
    public function progress() {
        return $this->hasOne(Advance::class);
    }

    // Relación con TechnicalFile (expedientes técnicos)
    public function technicalFiles() {
        return $this->hasMany(File::class); // Asegúrate de que el modelo se llame TechnicalFile
    }
}