@extends('layouts.app')

@section('contenido')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Editar Materia
            </div>
            <div class="card-body">
              <form action="{{ route('materias.update', $materia->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="name">Codigo</label>
                  <input type="text" name="codigo" required class="form-control" value="{{ $materia->codigo }}">
                </div>
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" name="nombre" required class="form-control" value="{{ $materia->nombre }}">
                </div>
                <div class="form-group">
                  <label for="email">Semestre</label>
                  <input type="text" name="semestre" required class="form-control" value="{{ $materia->semestre }}">
                </div>
                <div class="form-group">
                  <label for="email">Cupo minimo</label>
                  <input type="text" name="semestre" required class="form-control" value="{{ $materia->cupos_minimos }}">
                </div>
                <div class="form-group">
                  <label for="email">Cupo maximo</label>
                  <input type="text" name="semestre" required class="form-control" value="{{ $materia->cupos_maximos }}">
                </div>
                <div class="form-group">
                  <label for="email">Prerequisito</label>
                  <select name="prerequisito_id" id="" class="form-select">
                    <option value="{{$materia->id}}">{{$materia->prerequisito->nombre}}</option>
                    @foreach($materias as $materia)
                      <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                    @endforeach
                  </select>
                </div>
               <br>
               
                <div class="justify-content-end">
                  <input type="submit" value="Actualizar" class="btn btn-success">
                  <a href="{{route('materias.index')}}" class="btn btn-info">Cancelar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection