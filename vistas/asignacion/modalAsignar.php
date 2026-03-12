<form id="frmAsignaEquipo" method="POST" onsubmit="return asignarEquipo()" enctype="multipart/form-data">
  <div class="modal fade" id="modalAsignarEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asignar equipo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="idAsignacion" id="idAsignacion">
          <div class="row">
            <div class="col-sm-6">
              <label>A persona</label>
              <?php 
                require_once __DIR__ . "/../../clases/conexion.php";
                $con = new Conexion();
                $conexion = $con->conectar();
                $sql = "SELECT id_persona, nombre, paterno, materno FROM t_persona";
                $result = mysqli_query($conexion, $sql);
              ?>
              <select name="idPersona" id="idPersona" class="form-control" required>
                  <option value="">Selecciona una persona</option>
                  <?php while($mostrar = mysqli_fetch_array($result)) { ?>
                    <option value="<?php echo $mostrar['id_persona']; ?>">
                        <?php echo $mostrar['nombre'] . ' ' . $mostrar['paterno'] . ' ' . $mostrar['materno']; ?>
                    </option>
                  <?php } ?>
              </select>
            </div>
            <div class="col-sm-6">
              <label>Tipo de equipo</label>
              <select name="idTipoEquipo" id="idTipoEquipo" class="form-control" required>
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
              <input type="text" name="marca" id="marca" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Modelo</label>
              <input type="text" name="modelo" id="modelo" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Color</label>
              <input type="text" name="color" id="color" class="form-control" required>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-sm-12">
              <label>Descripción</label>
              <textarea name="descripcion" id="descripcion" class="form-control" rows="2" required></textarea>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Memoria RAM</label>
              <input type="text" name="memoria" id="memoria" class="form-control">
            </div>
            <div class="col-sm-4">
              <label>Disco duro</label>
              <input type="text" name="discoDuro" id="discoDuro" class="form-control">
            </div>
            <div class="col-sm-4">
              <label>Procesador</label>
              <input type="text" name="procesador" id="procesador" class="form-control">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Asignar</button>
        </div>
      </div>
    </div>
  </div>
</form>
