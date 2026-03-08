<form id="frmActualizarUsuario" method="POST" onsubmit="return actualizarUsuario()">
  <div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idUsuario" name="idUsuario">
          <div class="row">
            <div class="col-sm-4">
              <label for="paternoU">Apellido paterno</label>
              <input type="text" class="form-control" id="paternoU" name="paternoU" required>
            </div>
            <div class="col-sm-4">
              <label for="maternoU">Apellido materno</label>
              <input type="text" class="form-control" id="maternoU" name="maternoU" required>
            </div>
            <div class="col-sm-4">
              <label for="nombreU">Nombre</label>
              <input type="text" class="form-control" id="nombreU" name="nombreU" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-4">
              <label for="fechaNacimientoU">Fecha de nacimiento</label>
              <input type="date" class="form-control" id="fechaNacimientoU" name="fechaNacimientoU" required>
            </div>
            <div class="col-sm-4">
              <label for="sexoU">Sexo</label>
              <select class="form-control" id="sexoU" name="sexoU" required>
                <option value="">Seleccione...</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="telefonoU">Teléfono</label>
              <input type="text" class="form-control" id="telefonoU" name="telefonoU">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-4">
              <label for="correoU">Correo</label>
              <input type="email" class="form-control" id="correoU" name="correoU" required>
            </div>
            <div class="col-sm-4">
              <label for="usuarioU">Usuario</label>
              <input type="text" class="form-control" id="usuarioU" name="usuarioU" required>
            </div>
            <div class="col-sm-4">
              <label for="idRolU">Rol de usuario</label>
              <select class="form-control" id="idRolU" name="idRolU" required>
                <option value="">Seleccione un rol...</option>
                <option value="2">Cliente</option>
                <option value="1">Administrador</option>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-12">
              <label for="ubicacionU">Ubicación</label>
              <textarea class="form-control" id="ubicacionU" name="ubicacionU" rows="2"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-warning">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>
