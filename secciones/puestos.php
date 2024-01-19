<span>Puestos</span>
<div class="card">
  <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar puesto
      </button>
  </div>
  <div class="card-body">
  <table class="table table-hover" id="table-puestos">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre del puesto</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="puestos">

  </tbody>
</table>
  </div>
</div>




<!-- Modal Agregar-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Datos del puesto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-agregapuesto">
            <div class=" mb-3">
                <label for="nombredelpuesto" class="form-label">Nombre del puesto</label>
                <input type="text" class="form-control" id="nombredelpuesto" aria-describedby="emailHelp" placeholder="Ingrese nombre">
            </div>
        </form> 
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" id="guardar-puesto" class="btn btn-success btn-sm">Guardar</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal Actualizar-->
<div class="modal fade" id="actualizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar puesto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-actualizarpuesto">
            <div class=" mb-3">
                <label for="actualizarpuesto" class="form-label">Nombre del puesto</label>
                <input type="text" class="form-control" id="actualizarpuesto"  placeholder="Ingrese nombre">
                <input type="hidden" id="id-puesto" value="">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm" id="btn-actzpuesto">Actualizar</button>
      </div>
    </div>
  </div>
</div>