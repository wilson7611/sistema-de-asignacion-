<?php

namespace App\Http\Controllers;

use App\Models\Aprobacion;
use App\Models\Aula;
use App\Models\Horario;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }
    public function create()
    {
        $aulas = Aula::all();
        $materias = Materia::all();
        return view('horarios.create', compact('materias', 'aulas'));
    }
    // Método para crear un horario
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'semestre' => 'required',
            'cupos_minimos' => 'required',
            'cupos_maximos' => 'required',
            'estado' => 'nullable',
            'prerequisito_id' => 'required',
        ]);

        // Obtener el docente autenticado
        $user = Auth::user();
        if (!$user->hasRole('decano')) {
            return back()->with('error', 'Solo los decanos pueden crear materia.');
        }

            Materia::create([
                'codigo' => $request->codigo,
                'nombre' => $request->nombre,
                'semestre' => $request->semestre, // Aquí usamos el ID del usuario autenticado
                'cupos_minimos' => $request->cupos_minimos,
                'cupos_maximos' => $request->cupos_maximos,
                'prerequisito_id' => $request->prerequisito_id,
            ]);
        

        return back()->with('success', 'Materia creados exitosamente.');
    
    }

    // Método para aprobar una materia
    public function aprobarMateria(Request $request)
    {
        $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Verificar que el docente tenga al menos dos estudiantes aprobados
        $cantidadEstudiantes = Aprobacion::where('materia_id', $request->materia_id)->count();

        if ($cantidadEstudiantes < 2) {
            return back()->with('error', 'No se puede aprobar la materia. Se requieren al menos dos estudiantes.');
        }

        // Crear la aprobación
        Aprobacion::create([
            'materia_id' => $request->materia_id,
            'user_id' => $request->user_id, // ID del estudiante que aprueba
        ]);

        return back()->with('success', 'Materia aprobada exitosamente.');
    }
}
