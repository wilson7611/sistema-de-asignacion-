<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprobacion extends Model
{
    use HasFactory;
    protected $fillable = ['materia_id', 'user_id'];

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }

    public function estudiante()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
