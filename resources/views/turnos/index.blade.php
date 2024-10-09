@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title mb-0">Solicitudes Aprobadas</h5>
              
                <a class="btn btn-light" href="{{route('turnos.create')}}" >
                    <i class="bi-plus-circle me-2"></i>Aprobar Solicitud
                </a>
            </div>
            <div class="card-body">
                <table id="model-datatables" class="table table-bordered nowrap table-striped align-middle"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Codigo</th>
                            <th>Materia</th>
                            <th>Cupo Minimo</th>
                            <th>Cupo Maximo</th>
                            <th>Aula</th>
                            <th>Docente</th>
                            <th>Turno</th>
                            <th>Dia</th>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                            @role('super-admin')
                                <th>Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cont = 0; ?>
                        @foreach ($turnos as $turno)
                            <?php $cont = $cont + 1; ?>
                            <tr>
                                <td>{{ $cont }}</td>
                                <td>{{ $turno->materia->codigo }}</td>
                                <td>{{ $turno->materia->nombre }}</td>
                                <td>{{ $turno->materia->cupos_minimos }}</td>
                                <td>{{ $turno->materia->cupos_maximos }}</td>
                                <td>{{ $turno->aula->nombre }}</td>
                                <td>{{ $turno->docente->name }}</td>
                                <td>{{ $turno->tipo_turno }}</td>
                                <td>{{ $turno->dia_semana }}</td>
                                <td>{{ $turno->hora_inicio }}</td>
                                <td>{{ $turno->hora_fin }}</td>
                                @role('super-admin')
                                    <td>
                                      
                                        <a href="{{route('materias.edit', $materia->id)}}"  class="link-warning editIcon"><i
                                                class="ri-edit-2-fill"></i></a>
                                        <a href="{{route('materias.show', $materia->id)}}" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                    </td>
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection