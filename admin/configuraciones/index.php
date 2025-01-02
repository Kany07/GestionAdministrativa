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
        <h1>Configuraciones del sistema</h1>
        </div>
        <div class="card card-outline card-secondary"><br>
        <div class="row">

            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="bi bi-building-gear"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><h6>Datos de la institución</h6></span>
                        <a href="institucion" class="btn btn-info btn-xs">Configurar</a>
                    </div>
                </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="bi bi-calendar-range"></i></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><h6>Gestión educativa</h6></span>
                        <a href="gestion" class="btn btn-primary btn-xs">Configurar</a>
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
include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');
?>
