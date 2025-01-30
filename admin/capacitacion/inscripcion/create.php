<?php 
include ('../../../app/config.php'); 
include ('../../../admin/layout/parte1.php');
include ('../../../app/controllers/capacitacion/cursos/listado_capacitacion.php');
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Incribir a un nuevo curso</h1>
        </div>
        <div class="row">
            <div class = "col-md-8">
                <div class="card card-outline card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>
                    </div>
                    <a href="<?=APP_URL;?>/admin/capacitacion/cursos/index.php" style= "margin-left: 450px" class="btn btn-dark">Más cursos<big><i class="bi bi-arrow-right-circle"></i></big></a>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/capacitacion/inscripcion/create.php" method="post">
         <div class="form-group">
           <label for="curso_id">Cursos</label>
               <select name="curso_id" id="curso_id" class="form-control" required>
                   <option value="">Seleccione un curso</option>
                      <?php foreach ($capacitaciones as $capacitacion) { 
                         if ($capacitacion['estado']=="1") { ?>
                           <option value="<?= $capacitacion['id_cursos']; ?>"><?= $capacitacion['nombre']; ?></option>
                       <?php    
                       }
                     ?> 
                  <?php } ?>
            </select>
         </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Empleado</label>
                                <input type="text" name="empleado" placeholder="Nombre completo" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" name="fecha_inscripcion" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-dark">Inscribir</button>
                           <a href="<?= APP_URL;?>/admin/capacitacion/inscripcion/index.php" class="btn btn-secondary">Cancelar</a>
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
