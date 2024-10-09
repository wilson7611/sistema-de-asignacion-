@extends('layouts.app')

@section('contenido')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Eliminar estudiante
            </div>
            <div class="card-body">
              <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                @method('DELETE')
                @csrf
               <p>Deseas Eliminar a <span>{{$estudiante->nombre}}</span>
               </p>
               
                <div class="justify-content-end">
                  <input type="submit" value="SI" class="btn btn-success">
                  <a href="{{route('estudiantes.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection