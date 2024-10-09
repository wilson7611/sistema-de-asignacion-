<!-- resources/views/materias/aprobar.blade.php -->
@extends('layouts.app')

@section('contenido')
<div class="container">
    <h2>Aprobar Materia</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('materia.aprobar') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="materia_id">Materia</label>
            <select name="materia_id" id="materia_id" class="form-control" required>
                @foreach ($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="docente_id">Docente</label>
            <select name="docente_id" id="docente_id" class="form-control" required>
                @foreach ($docentes as $docente)
                    <option value="{{ $docente->id }}">{{ $docente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tipo_turno">Tipo de Turno</label>
            <select name="tipo_turno" id="tipo_turno" class="form-control" required>
                <option value="mañana">Mañana</option>
                <option value="tarde">Tarde</option>
                <option value="noche">Noche</option>
            </select>
        </div>

        <div class="form-group">
            <label for="aula_id">Aula</label>
            <select name="aula_id" id="aula_id" class="form-control" required>
                @foreach ($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Aprobar Materia</button>
    </form>
</div>
@endsection
