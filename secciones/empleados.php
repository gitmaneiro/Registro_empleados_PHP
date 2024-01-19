<span>Empleados</span>
<div class="card">
  <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar empleado
      </button>
  </div>
  <div class="card-body">
  <table class="table table-hover" id="table-empleados">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Foto</th>
      <th scope="col">CV</th>
      <th scope="col">Puesto</th>
      <th scope="col">Fecha de Ingreso</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="body-empleados">

  </tbody>
</table>
  </div>
</div>


<!-- Modal Agregar-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
        <div class="card-body">
            <form id="form-agregaempleado"  enctype="multipart/form-data">
              <div class=" mb-3">
                <label for="primernombre" class="form-label">Primer nombre</label>
                <input type="text" class="form-control" name="primernombre" id="primernombre" aria-describedby="emailHelp" placeholder="Ingrese primer nombre">
              </div>
              <div class=" mb-3">
                <label for="segundonombre" class="form-label">Segundo nombre</label>
                <input type="text" class="form-control" name="segundonombre" id="segundonombre" aria-describedby="emailHelp" placeholder="Ingrese segundo nombre">
              </div>
              <div class=" mb-3">
                <label for="primerapellido" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="primerapellido" id="primerapellido" aria-describedby="emailHelp" placeholder="Ingrese primer apellido">
              </div>
              <div class=" mb-3">
                <label for="segundoapellido" class="form-label">Segundo apellido</label>
                <input type="text" class="form-control" name="segundoapellido" id="segundoapellido" aria-describedby="emailHelp" placeholder="Ingrese segundo apellido">
              </div>
              <div class=" mb-3">
                <label for="foto"class="form-label" >Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <div class=" mb-3">
                <label for="cv"class="form-label" >CV (PDF)</label>
                <input type="file" name="cv" id="cv" class="form-control">
            </div>
            <div class="mb-3">
                <label for="selectagregaempleado" class="form-label">Puesto</label>
                <select class="form-control form-control-sm" name="selectagregaempleado" id="selectagregaempleado">
                <option value="0">Seleccione puesto ></option>
                </select>
            </div>
            <div class=" mb-3">
                <label for="fechadeingreso" class="form-label">Fecha de ingreso</label>
                <input type="date" class="form-control" name="fechadeingreso" id="fechadeingreso" aria-describedby="emailHelp" placeholder="Ingrese segundo apellido">
              </div>
        </form>
      </div>
</div>  
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-agrega-empleado" class="btn btn-success btn-sm">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Editar-->
<div class="modal fade" id="act_empleado_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
        <div class="card-body">
        <form id="form-act-empleado"  enctype="multipart/form-data">
              <input type="hidden" name="id-edit-empleado" id="id-edit-empleado" value="">
              <div class=" mb-3">
                <label for="primernombreu" class="form-label">Primer nombre</label>
                <input type="text" class="form-control" name="primernombreu" id="primernombreu" aria-describedby="emailHelp" placeholder="Ingrese primer nombre">
              </div>
              <div class=" mb-3">
                <label for="segundonombreu" class="form-label">Segundo nombre</label>
                <input type="text" class="form-control" name="segundonombreu" id="segundonombreu" aria-describedby="emailHelp" placeholder="Ingrese segundo nombre">
              </div>
              <div class=" mb-3">
                <label for="primerapellidou" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="primerapellidou" id="primerapellidou" aria-describedby="emailHelp" placeholder="Ingrese primer apellido">
              </div>
              <div class=" mb-3">
                <label for="segundoapellidou" class="form-label">Segundo apellido</label>
                <input type="text" class="form-control" name="segundoapellidou" id="segundoapellidou" aria-describedby="emailHelp" placeholder="Ingrese segundo apellido">
              </div>
              <div class=" mb-3">
                <label for="fotou"class="form-label" >Foto</label>
                <img id="img-act-empleado" src="" width="40" />
                <input type="file" name="fotou" id="fotou" class="form-control">
            </div>
            <div class=" mb-3">
                <label for="cvu"class="form-label" >CV (PDF)</label>
                <a id="cvu-a" href=""></a>
                <input type="file" name="cvu" id="cvu" class="form-control">
            </div>
            <div class="mb-3">
                <label for="selectagregaempleadou" class="form-label">Puesto</label>
                <select class="form-control form-control-sm" name="selectagregaempleadou" id="selectagregaempleadou">
                <option value="0">Seleccione puesto ></option>
                </select>
            </div>
            <div class=" mb-3">
                <label for="fechadeingresou" class="form-label">Fecha de ingreso</label>
                <input type="date" class="form-control" name="fechadeingresou" id="fechadeingresou" aria-describedby="emailHelp">
              </div>
        </form>
      </div>
</div>  
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-act-empleado" class="btn btn-primary btn-sm">Actualizar</button>
      </div>
    </div>
  </div>
</div>



