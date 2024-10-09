<!-- resources/views/materias/aprobar.blade.php -->
@extends('layouts.app')

@section('contenido')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h2>Aprobar Materia</h2>
    </div>
    <div class="card-body">
       
            
        
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('turnos.store') }}" method="POST">
                @csrf
            <div class="row mt-2">
                
    
                <div class="col-md-6">
                    
                        <label for="materia_id">Materia</label>
                        
                        <select name="materia_id" id="materia_id" class="form-select" required>
                            <option value="">Selecione Materia</option>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                            @endforeach
                        </select>
                    
                </div>
                <div class="col-md-6">
                                            <label for="docente_id">Docente</label>
                        <select name="docente_id" id="docente_id" class="form-select" required>
                            <option value="">Elija Docente</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->name }}</option>
                            @endforeach
                        </select>
                    
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    
               
                    <label for="tipo_turno">Tipo de Turno</label>
                    <select name="tipo_turno" id="tipo_turno" class="form-select" required>
                        <option value="">Elija turno</option>
                        <option value="mañana">Mañana</option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                    </select>
               
                </div>
                <div class="col-md-6">
               
                        <label for="aula_id">Aula</label>
                        <select name="aula_id" id="aula_id" class="form-select" required>
                            <option value="">Elija un aula</option>
                            @foreach ($aulas as $aula)
                                <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                            @endforeach
                        </select>
                   
                </div>    
            </div>        
        
                <button type="submit" class="btn btn-success mt-3">Aprobar Materia</button>
            </form>
        </div>
    </div>


@endsection
