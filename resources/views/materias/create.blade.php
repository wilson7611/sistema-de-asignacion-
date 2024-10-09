
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalgridLabel">Nuevo Registro</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="{{route('materias.store')}}" method="POST" >
        @csrf
    <div class="row g-3">
        <div class="col-xxl-12">
            <div>
                <label for="firstName" class="form-label">Nombre Materia</label>
                <input type="text" name="nombre" class="form-control" id="firstName" placeholder="Introducir Nombre">
            </div>
        </div><!--end col-->
        <div class="col-xxl-12">
            <div>
                <label for="firstName" class="form-label">Codigo</label>
                <input type="text" name="nombre" class="form-control" id="firstName" placeholder="Introducir Nombre">
            </div>
        </div><!--end col-->
        
        <div class="col-xxl-12">
            <div>
                <label for="emailInput" class="form-label">Semestre</label>
                <input type="text" name="semestre" class="form-control" id="emailInput" placeholder="Introducir email">
            </div>
        </div><!--end col-->
        <div class="col-xxl-12">
            <div>
                <label for="emailInput" class="form-label">cupo maximo</label>
                <input type="text" name="cupos_maximos" class="form-control" id="emailInput" placeholder="Introducir email">
            </div>
        </div><!--end col-->
        <div class="col-xxl-12">
            <div>
                <label for="emailInput" class="form-label">cupo minimo</label>
                <input type="text" name="cupos_minimos" class="form-control" id="emailInput" placeholder="Introducir email">
            </div>
        </div><!--end col-->

        <div class="col-xxl-12">
            <div>
                <label for="emailInput" class="form-label">Prerequisito</label>
                <select name="prerequisito_id" id="">
                    @foreach ($materias as $materia)
                        
                    <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div><!--end col-->

        <div class="col-xxl-12">
            <div>
                <label for="emailInput" class="form-label">estado</label>
                <select name="estado" id="">
                    @foreach ($materias as $materia)
                    <option value="{{$materia->id}}">{{$materia->estado}}</option>
                    @endforeach
                </select>
            </div>
        </div><!--end col-->
      
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button id="add_user_btn"  type="submit" class="btn btn-success">Registrar</button>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    </form>
    </div>
    </div>
    </div>
    </div>