<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    // Relación con las solicitudes
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }

    // Verificar si el usuario es estudiante
    public function esEstudiante()
    {
        return $this->role === 'estudiante';
    }

    // Verificar si el usuario es decano
    public function esDecano()
    {
        return $this->role === 'decano';
    }

    // Verificar si el usuario es docente
    public function esDocente()
    {
        return $this->role === 'docente';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
