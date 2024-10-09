<!-- resources/views/horarios/create.blade.php -->
@extends('layouts.app')

@section('contenido')
<div class="container">
    <h2>Crear Horario</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('horarios.store') }}" method="POST">
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
            <label for="aula_id">Aula</label>
            <select name="aula_id" id="aula_id" class="form-control" required>
                @foreach ($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Días de la Semana</label><br>
            <div>
                <label>
                    <input type="checkbox" name="dias[]" value="Lunes"> Lunes
                </label>
                <label>
                    <input type="checkbox" name="dias[]" value="Martes"> Martes
                </label>
                <label>
                    <input type="checkbox" name="dias[]" value="Miércoles"> Miércoles
                </label>
                <label>
                    <input type="checkbox" name="dias[]" value="Jueves"> Jueves
                </label>
                <label>
                    <input type="checkbox" name="dias[]" value="Viernes"> Viernes
                </label>
                <label>
                    <input type="checkbox" name="dias[]" value="Sábado"> Sábado
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="hora_inicio">Hora de Inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="hora_fin">Hora de Fin</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Horario</button>
    </form>
</div>
@endsection
