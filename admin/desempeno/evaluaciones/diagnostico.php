<?php 
include ('../../../app/config.php'); 
include ('../../../admin/layout/parte1.php');

include ('../../../app/controllers/desempeno/evaluaciones/listado_de_evaluaciones.php');
?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Evaluar personal</h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-dark">
              <div class="card-header">
                <h2 class="card-title">Califique</h2>
              </div>
              <a href="<?=APP_URL;?>/admin/desempeno/objetivos/index.php" style= "margin-left: 800px" class="btn btn-dark">Objetivos activos  <big><i class="bi bi-arrow-right-circle"></i></big></a>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/desempeno/evaluaciones/diagnostico.php" method="post">

               <div class="row">
               <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nombres</label>
                        <input type="text" name="nombres" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Rol</label>
                        <input type="text" name="rol" class="form-control">
                            
                      </div>
                </div>
               </div>
               <br>
               
               <center><h4>Áreas de Evaluación</h4></center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Puntualidad (1-10)</label>
                                            <input type="number" name="puntualidad" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Responsabilidad (1-10)</label>
                                            <input type="number" name="responsabilidad" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Entrega de Recaudos (1-10)</label>
                                            <input type="number" name="entrega_recaudos" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Cumplimiento Normativo (1-10)</label>
                                            <input type="number" name="cumplimiento_normativo" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Eficiencia (1-10)</label>
                                            <input type="number" name="eficiencia" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Alcance de Objetivo (1-10)</label>
                                            <input type="number" name="alcance" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Media (resultado)</label>
                                            <input type="text" id="media" name="media" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="button" id="calcular" class="btn btn-outline-light">Calcular</button>
                                        </div>
                                    </div>
                                </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-dark">Guardar</button>
                           <a href="<?= APP_URL;?>/admin/desempeno/evaluaciones" class="btn btn-secondary">Cancelar</a>
                      </div>
                </div>
              </div>
               </form>
            </div>
          </div>
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include ('../../../admin/layout/parte2.php');
include ('../../../layout/mensajes.php');
?>
<script>
document.getElementById('calcular').addEventListener('click', function() {
    // Obtener valores de los campos de calificación
    const puntualidad = parseInt(document.querySelector('input[name="puntualidad"]').value) || 0;
    const responsabilidad = parseInt(document.querySelector('input[name="responsabilidad"]').value) || 0;
    const entrega_recaudos = parseInt(document.querySelector('input[name="entrega_recaudos"]').value) || 0;
    const cumplimiento_normativo = parseInt(document.querySelector('input[name="cumplimiento_normativo"]').value) || 0;
    const eficiencia = parseInt(document.querySelector('input[name="eficiencia"]').value) || 0;
    const alcance = parseInt(document.querySelector('input[name="alcance"]').value) || 0;

    // Calcular la media
    const media = (puntualidad + responsabilidad + entrega_recaudos + cumplimiento_normativo + eficiencia + alcance) / 6;

    // Mostrar el resultado
    document.getElementById('media').value = media.toFixed(2); // Redondear a 2 decimales
});
</script>