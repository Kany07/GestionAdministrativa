<?php 
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Inscripciones: <?=$year_actual;?></h1>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="bi bi-backpack3"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Inscripciones</span>
                    <a href="<?=APP_URL;?>/admin/secciones/createA.php" class="btn btn-primary btn-sm">Nuevo estudiate</a>
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
<!-- Page specific script -->
