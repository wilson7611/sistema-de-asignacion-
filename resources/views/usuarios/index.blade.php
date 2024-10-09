@extends('layouts.app')

@section('contenido')
    @include('usuarios.create')
    

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Lista De Usuarios</h5>
                    <a class="btn btn-light" href="" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi-plus-circle me-2"></i>Agregar Nuevo Registro
                    </a>
                </div>
                <div class="card-body">
                    <table id="model-datatables" class="table table-bordered nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                @role('super-admin')
                                    <th>Action</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cont = 0; ?>
                            @foreach ($usuarios as $usuario)
                                <?php $cont = $cont + 1; ?>
                                <tr>
                                    <td>{{ $cont }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->roles->implode('name', ', ') }}</td>
                                    @role('super-admin')
                                        <td>
                                         
                                            <a href="{{route('usuarios.edit', $usuario->id)}}"  class="link-warning editIcon"><i
                                                    class="ri-edit-2-fill"></i></a>
                                            <a href="{{route('usuarios.show', $usuario->id)}}" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
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
