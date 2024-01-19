<span>Usuarios</span>
<div class="card">
  <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#agregarusuarioModal">
        Agregar usuario
      </button>
  </div>
  <div class="card-body">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre del usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Correo</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="usuarios">

  </tbody>
</table>
  </div>
</div>


<!-- Modal Agregar -->
<div class="modal fade" id="agregarusuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="form-agregausuario">
            <div class=" mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp" placeholder="Ingrese usuario">
            </div>
            <div class=" mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Ingrese nombre">
            </div>
            <div class=" mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" aria-describedby="emailHelp" placeholder="Ingrese nombre">
            </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" id="guardar-usuario" class="btn btn-success btn-sm">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Editar -->
<div class="modal fade" id="editarusuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="form-editarusuario">
            <div class=" mb-3">
            <input type="hidden" id="id-edit-usuario" value="">
                <label for="edit-usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="edit-usuario" aria-describedby="emailHelp" placeholder="Ingrese usuario">
            </div>
            <div class=" mb-3">
                <label for="edit-correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="edit-correo" aria-describedby="emailHelp" placeholder="Ingrese nombre">
            </div>
            <div class=" mb-3">
                <label for="edit-contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="edit-contrasena" aria-describedby="emailHelp" placeholder="Ingrese nombre">
            </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" id="guardar-edit-usuario" class="btn btn-primary btn-sm">Actualizar</button>
      </div>
    </div>
  </div>
</div>