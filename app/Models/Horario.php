<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = ['materia_id', 'aula_id', 'docente_id', 'dia_semana', 'hora_inicio', 'hora_fin'];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function docente()
    {
        return $this->belongsTo(User::class, 'docente_id');
    }
}
