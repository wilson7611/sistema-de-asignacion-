@extends('layouts.app')

@section('contenido')



<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Nueva Solicitud</h3>
    </div>
    <div class="card-body">
        <div class="container">
            {{-- Mostrar mensajes de éxito --}}
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        
            {{-- Mostrar mensajes de error --}}
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        
            {{-- Tu formulario de solicitud de materia --}}
            <form action="{{ route('solicitudes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="materia_id">Seleccione la materia:</label>
                    <select name="materia_id" id="materia_id" class="form-select">
                        <option value="">Elija Materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Enviar Solicitud</button>
            </form>
        </div>
    </div>
</div>


@endsection