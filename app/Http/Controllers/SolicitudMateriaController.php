<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Materia;
use App\Models\Solicitud;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SolicitudMateriaController extends Controller
{
    public function index()
    {
        $turnos = Turno::all();
        return view('turnos.index', compact('turnos'));
    }
    public function create()
    {
        $docentes = User::role('docente')->get();
        $materias = Materia::all();
        $aulas = Aula::all();
        return view('turnos.create', compact('materias', 'aulas', 'docentes'));
    }
    public function store(Request $request)
    {
        
            $request->validate([
                'materia_id' => 'required|exists:materias,id',
                'docente_id' => 'required|exists:users,id',
                'tipo_turno' => 'required|in:mañana,tarde,noche', 
                'aula_id' => 'required|exists:aulas,id', // Asegúrate de que también validates aula_id
            ]);

            // Verificar que el usuario sea decano
            $user = Auth::user();
            if (!$user->hasRole('decano')) {
                return back()->with('error', 'Solo el decano puede aprobar materias.');
            }

            $materia = Materia::findOrFail($request->materia_id);
            $solicitudes = Solicitud::where('materia_id', $materia->id)
                ->where('estado', 'pendiente')
                ->get();

            // Si hay 2 a 3 estudiantes, asignar 3 días
            $dias = [];
            if ($solicitudes->count() >= 2 && $solicitudes->count() <= 3) {
                $dias = ['Lunes', 'Miércoles', 'Viernes'];
            } elseif ($solicitudes->count() > 3 && $solicitudes->count() <= 4) {
                $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves'];
            }elseif ($solicitudes->count() > 4) {
                $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
            } else {
                return back()->with('error', 'No hay suficientes solicitudes para aprobar la materia.');
            }

            // Asignar horas según el tipo de turno
            $horarios = [
                'mañana' => ['08:00:00', '11:00:00'],
                'tarde' => ['15:00:00', '18:00:00'],
                'noche' => ['19:00:00', '22:00:00'],
            ];

            // Crear turnos para los días asignados
            foreach ($dias as $dia) {
                Turno::create([
                    'materia_id' => $materia->id,
                    'aula_id' => $request->aula_id,
                    'docente_id' => $request->docente_id,
                    'dia_semana' => $dia,
                    'tipo_turno' => $request->tipo_turno,
                    'hora_inicio' => $horarios[$request->tipo_turno][0],
                    'hora_fin' => $horarios[$request->tipo_turno][1],
                ]);
            }

            return back()->with('success', 'Materia aprobada y turnos creados exitosamente.');
        }
    }




