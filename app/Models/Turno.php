<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'materia_id',
        'aula_id',
        'docente_id',
        'dia_semana',
        'tipo_turno',
        'hora_inicio',
        'hora_fin',
    ];

    // Relación con el modelo Materia
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    // Relación con el modelo Aula
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    // Relación con el modelo User (Docente)
    public function docente()
    {
        return $this->belongsTo(User::class, 'docente_id');
    }
}
