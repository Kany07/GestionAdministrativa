<?php 
$id_nivel = $_GET['id'];
include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/niveles/datos_nivel.php');
?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Nivel: <?=$nivel;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-8">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/niveles/create.php" method="post">
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Gestión academica</label>
                               <p class="form-control"><i class="bi bi-person-workspace"></i> <?=$gestion;?></p>
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Niveles</label>
                                <p class="form-control"><i class="bi bi-reception-3"></i> <?=$nivel;?></p>
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Turno</label>
                                <p class="form-control"><i class="bi bi-clock"></i> <?=$turno;?></p>
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Fecha y hora de creación</label>
                                <p class="form-control"><i class="bi bi-calendar-date"></i> <?=$fyh_creacion;?></p>
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                         <label for="">Estado</label>
                         <p class="form-control"><i class="bi bi-power"></i>
                         <?php
                         if ($estado == '1') echo "ACTIVO"; else echo "INACTIVO";
                         ?>
                        </p>
                    </div>
                 </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <a href="<?= APP_URL;?>/admin/niveles" class="btn btn-primary">Volver</a>
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
include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');
?>
