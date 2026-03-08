<form id="frmAgregarSolucion" method="POST" onsubmit="return agregarSolucion()">
  <div class="modal fade" id="modalAgregarSolucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Escribir solución del reporte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="idReporte" id="idReporte">
          <div class="row">
            <div class="col-sm-12">
              <label>Descripción de la solución</label>
              <textarea name="solucion" id="solucion" class="form-control" rows="4" required></textarea>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-12">
              <label>Estado</label>
              <select name="estado" id="estado" class="form-control" required>
                  <option value="">Selecciona un estado</option>
                  <option value="abierto">Abierto</option>
                  <option value="cerrado">Cerrado</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>
