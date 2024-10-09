<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'semestre', 'cupos_minimos', 'cupos_maximos', 'estado', 'prerequisito_id'];

    public function prerequisito()
    {
        return $this->belongsTo(Materia::class, 'prerequisito_id');
    }
}
