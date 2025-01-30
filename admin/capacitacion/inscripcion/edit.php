<?php 
$id_participantes = $_GET['id'];
include ('../../../app/config.php'); 
include ('../../../admin/layout/parte1.php');
include ('../../../app/controllers/capacitacion/cursos/listado_capacitacion.php');
include ('../../../app/controllers/capacitacion/inscripcion/datos_inscripcion.php');
?>   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Modificar inscripción
        </h1>
        </div>
        <div class="row">
          <div class = "col-md-8">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Actualice los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/capacitacion/inscripcion/update.php" method="post">
               <div class="form-group">
           <label for="curso_id">Cursos</label>
           <input type="text" name="id_participantes" value="<?=$id_participantes;?>" hidden>
               <select name="curso_id" id="curso_id" class="form-control">
                   <?php
                       foreach ($capacitaciones as $capacitacion) {
                         if ($capacitacion['estado']=="1") { ?>
                           <option value="<?= $capacitacion['id_cursos']; ?>"
                            <?php 
                            if($curso_id == $capacitacion['id_cursos']){ ?> selected="selected" <?php } ?>>
                            <?=$capacitacion ['nombre']; ?>
                          </option>
                       <?php    
                       }
                     ?> 
                  <?php 
                } 
                ?>
            </select>
         </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Empleado</label>
                                <input type="text" name="empleado" value="<?=$empleado;?>" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-warning" style="color: white;">Actualizar</button>
                           <a href="<?= APP_URL;?>/admin/capacitacion/inscripcion/index.php" class="btn btn-secondary">Cancelar</a>
                      </div>
                </div>
              </div>
               </form>
               </div>
            </div>
          </div>
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   

<?php 
include ('../../../admin/layout/parte2.php');
include ('../../../layout/mensajes.php');
?>