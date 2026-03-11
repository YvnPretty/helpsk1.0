<form id="frmActualizarPassword" method="POST" onsubmit="return resetPassword()">
  <div class="modal fade" id="modalResetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambiar password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idUsuarioReset" name="idUsuarioReset">
          <label>Nuevo password</label>
          <input type="password" class="form-control" id="passwordReset" name="passwordReset" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-warning">Cambiar password</button>
        </div>
      </div>
    </div>
  </div>
</form>
