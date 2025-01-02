<?php 
$id_gestion = $_GET['id'];
include ('../../../app/config.php'); 
include ('../../../admin/layout/parte1.php');
include ('../../../app/controllers/configuraciones/gestion/datos_gestion.php');
?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>GESTIÓN: <?=$gestion;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-8">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
              </div>
              <div class="card-body">

               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-person-workspace"></i>   Gestión académica</label>
                                <p class="form-control"><?=$gestion;?></p>
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-calendar-date"></i>   Fecha y hora de creación</label>
                                <p class="form-control"><?=$fyh_creacion;?></p>
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-power"></i>   Estado</label>
                               <p class="form-control">
                                <?php
                                if ($estado == '1') echo "ACTIVO"; else echo "INACTIVO";
                                ?>
                               </p>
                            
                            </div>
                    </div>
                </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <a href="<?= APP_URL;?>/admin/configuraciones/gestion" class="btn btn-primary">Volver</a>
                      </div>
                </div>
              </div>
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