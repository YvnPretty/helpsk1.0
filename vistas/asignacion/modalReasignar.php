<form id="frmActualizaAsignacion" method="POST" onsubmit="return actualizaAsignacion()" enctype="multipart/form-data">
  <div class="modal fade" id="modalReasignarEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reasignar/Actualizar equipo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="idAsignacionU" id="idAsignacionU">
          <div class="row">
            <div class="col-sm-6">
              <label>A persona</label>
              <select name="idPersonaU" id="idPersonaU" class="form-control" required>
                  <option value="">Selecciona una persona</option>
                  <option value="1">help desk demo</option>
                  <option value="2">lopez martinez juan</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label>Tipo de equipo</label>
              <select name="idTipoEquipoU" id="idTipoEquipoU" class="form-control" required>
                  <option value="">Selecciona un tipo</option>
                  <option value="1">PC</option>
                  <option value="2">Laptop</option>
                  <option value="3">Impresora</option>
              </select>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Marca</label>
              <input type="text" name="marcaU" id="marcaU" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Modelo</label>
              <input type="text" name="modeloU" id="modeloU" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Color</label>
              <input type="text" name="colorU" id="colorU" class="form-control" required>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-sm-12">
              <label>Descripción</label>
              <textarea name="descripcionU" id="descripcionU" class="form-control" rows="2" required></textarea>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Memoria RAM</label>
              <input type="text" name="memoriaU" id="memoriaU" class="form-control">
            </div>
            <div class="col-sm-4">
              <label>Disco duro</label>
              <input type="text" name="discoDuroU" id="discoDuroU" class="form-control">
            </div>
            <div class="col-sm-4">
              <label>Procesador</label>
              <input type="text" name="procesadorU" id="procesadorU" class="form-control">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-warning">Actualizar / Reasignar</button>
        </div>
      </div>
    </div>
  </div>
</form>
