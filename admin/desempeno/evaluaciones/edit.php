<?php 
$id_evaluaciones = $_GET['id'];
include ('../../../app/config.php'); 
include ('../../../admin/layout/parte1.php');
include ('../../../app/controllers/desempeno/evaluaciones/datos_evaluacion.php');
?>   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Modificar evaluación <?=$nombres." ".$apellidos;?>
        </h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/desempeno/evaluaciones/update.php" method="post">
               <div class="row">
               <div class="col-md-4">
                      <div class="form-group">
                      <input type="text" name="id_evaluaciones" value="<?=$id_evaluaciones;?>"  hidden>
                        <label for="">Nombres</label>
                        <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Apellidos</label>
                        <input type="text" name="apellidos" value="<?=$apellidos;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Rol</label>
                        <input type="text" name="rol" value="<?=$rol;?>" class="form-control">
                            
                      </div>
                </div>
               </div>
               <br>
               <center><h4>Áreas de Evaluación</h4></center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Puntualidad (1-10)</label>
                                            <input type="number" name="puntualidad" value="<?=$puntualidad;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Responsabilidad (1-10)</label>
                                            <input type="number" name="responsabilidad" value="<?=$responsabilidad;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Entrega de Recaudos (1-10)</label>
                                            <input type="number" name="entrega_recaudos" value="<?=$entrega_recaudos;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Cumplimiento Normativo (1-10)</label>
                                            <input type="number" name="cumplimiento_normativo" value="<?=$cumplimiento_normativo;?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Eficiencia (1-10)</label>
                                            <input type="number" name="eficiencia" value="<?=$eficiencia;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Alcance de Objetivo (1-10)</label>
                                            <input type="number" name="alcance" value="<?=$alcance;?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Media (resultado)</label>
                                            <input type="text" id="media" name="media" value="<?=$media;?>" class="form-control" readonly>
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
                           <button type="submit" class="btn btn-warning" style="color: white">Actualizar</button>
                           <a href="<?= APP_URL;?>/admin/desempeno/evaluaciones/index.php" class="btn btn-secondary">Cancelar</a>
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