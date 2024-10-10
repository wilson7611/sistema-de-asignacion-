<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'semestre', 'cupos_minimos', 'cupos_maximos',  'prerequisito_id'];

    protected $attributes = [
        'estado' => 'pendiente', // valor por defecto
    ];
    public function prerequisito()
    {
        return $this->belongsTo(Materia::class, 'prerequisito_id');
    }
   
}
