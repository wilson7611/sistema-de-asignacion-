<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::all();
        return view('solicitudes.index', compact('solicitudes'));
    }
    public function create()
    {
        $materias = Materia::all();
        return view('solicitudes.create', compact('materias'));
    }
    
    public function store(Request $request)
{
    $user = Auth::user();

    // Validar la entrada
    $request->validate([
        'materia_id' => 'required|exists:materias,id',
    ]);

    // Verificar que el usuario tenga el rol de 'estudiante'
    if (!$user->hasRole('estudiante')) {
        return back()->with('error', 'Solo los estudiantes pueden solicitar materias.');
    }

    // Obtener la materia seleccionada
    $materia = Materia::findOrFail($request->materia_id);

    // Verificar si la materia está en estado "pendiente"
    if ($materia->estado != 'pendiente') {
        return back()->with('error', 'No puedes solicitar esta materia, ya está abierta o cerrada.');
    }

    // Verificar si la materia tiene un prerequisito y si el estudiante lo ha aprobado
    if ($materia->prerequisito && !$this->haCompletadoPrerequisito($user->id, $materia->prerequisito->id)) {
        return back()->with('error', 'No puedes solicitar esta materia porque no has aprobado el prerequisito.');
    }

    try {
        // Crear la inscripción
        Solicitud::create([
            'materia_id' => $materia->id,
            'user_id' => $user->id,
            'estado' => 'pendiente',
        ]);

        return back()->with('success', 'Solicitud enviada exitosamente.');
    } catch (\Exception $e) {
        // Registrar el error
        \Log::error('Error al crear la solicitud: '.$e->getMessage());
        return back()->with('error', 'Ocurrió un error al enviar la solicitud. Inténtalo de nuevo más tarde.');
    }
}

// Método para verificar si un estudiante aprobó el prerequisito
protected function haCompletadoPrerequisito($userId, $prerequisitoId)
{
    return Solicitud::where('user_id', $userId)
                      ->where('materia_id', $prerequisitoId)
                      ->where('estado', 'aprobada')
                      ->exists();
}
}
