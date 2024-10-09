@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title mb-0">Lista De Solicitudes</h5>
              
                <a class="btn btn-light" href="{{route('solicitudes.create')}}" >
                    <i class="bi-plus-circle me-2"></i>Nueva Solicitud
                </a>
            </div>
            <div class="card-body">
                <table id="model-datatables" class="table table-bordered nowrap table-striped align-middle"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Estudiante</th>
                            <th>Materia</th>
                            <th>Capacidad</th>
                            <th>Estado</th>
                            
                            @role('decano')
                                <th>Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cont = 0; ?>
                        @foreach ($solicitudes as $solicitud)
                            <?php $cont = $cont + 1; ?>
                            <tr>
                                <td>{{ $cont }}</td>
                                <td>{{ $solicitud->user->name }}</td>
                                <td>{{ $solicitud->materia->nombre }}</td>
                                <td>{{ $solicitud->estado }}</td>
                                @role('decano')
                                    <td>                           
                                        <a href="{{route('solicitudes.edit', $solicitud->id)}}"  class="link-warning editIcon"><i
                                                class="ri-edit-2-fill"></i></a>
                                        <a href="{{route('solicitudes.show', $solicitud->id)}}" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
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