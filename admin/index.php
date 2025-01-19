<?php 
include ('../app/config.php');
include ('../admin/layout/parte1.php');
include ('../app/controllers/roles/listado_de_roles.php');
include ('../app/controllers/usuarios/listado_de_usuarios.php');
include ('../app/controllers/niveles/listado_de_niveles.php');
include ('../app/controllers/asistencias/listado_de_asistencias.php');
include ('../app/controllers/administrativos/listado_de_administrativos.php');
include ('../app/controllers/docentes/listado_de_docentes.php');
include ('../app/controllers/obrerovigilante/listado_de_ov.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="container">
      <div class="container">
        <div class="row">
        <h1><?=APP_NAME;?></h1>
        </div>
        <br>
        <div class="row">

          <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $contador_roles = 0;
              foreach ($roles as $role) {
                $contador_roles = $contador_roles + 1;
              }
              ?>
              <h3><?=$contador_roles;?></h3>
              <p>Roles registrados</p>
          </div>
          <div class="icon">
            <i class="fas"><i class="bi bi-bookmarks"></i></i>
          </div>
          <a href="<?=APP_URL;?>/admin/roles" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
          </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $contador_usuarios = 0;
              foreach ($usuarios as $usuario) {
                $contador_usuarios = $contador_usuarios + 1;
              }
              ?>
              <h3><?=$contador_usuarios;?></h3>
              <p>Usuarios registrados</p>
          </div>
          <div class="icon">
            <i class="fas"><i class="bi bi-person-circle"></i></i>
          </div>
          <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
          </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <?php 
              $contador_niveles = 0;
              foreach ($niveles as $nivele) {
                $contador_niveles = $contador_niveles + 1;
              }
              ?>
              <h3><?=$contador_niveles;?></h3>
              <p>Niveles registrados</p>
          </div>
          <div class="icon">
            <i class="fas"><i class="bi bi-reception-3"></i></i>
          </div>
          <a href="<?=APP_URL;?>/admin/niveles" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
          </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <?php 
              $contador_asistencias = 0;
              foreach ($asistencias as $asistencia) {
                $contador_asistencias = $contador_asistencias + 1;
              }
              ?>
              <h3><?=$contador_asistencias;?></h3>
              <p>Asistencias registradas</p>
          </div>
          <div class="icon">
            <i class="fas"><i class="bi bi-person-lines-fill"></i></i>
          </div>
          <a href="<?=APP_URL;?>/admin/asistencias" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
          </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-light">
            <div class="inner">
              <?php
              $contador_administrativos = 0;
              foreach ($administrativos as $administrativo) {
                $contador_administrativos = $contador_administrativos + 1;
              }
              ?>
              <h3><?=$contador_administrativos;?></h3>
              <p>Administrativos registrados</p>
          </div>
          <div class="icon">
            <i class="fas"><i class="bi bi-person-rolodex"></i></i>
          </div>
          <a href="<?=APP_URL;?>/admin/administrativos" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
          </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-dark">
            <div class="inner">
              <?php
              $contador_docentes = 0;
              foreach ($docentes as $docente) {
                $contador_docentes = $contador_docentes + 1;
              }
              ?>
              <h3><?=$contador_docentes;?></h3>
              <p>Docentes registrados</p>
          </div>
          <div class="icon">
            <i class="fas"><i class="bi bi-person-video3"></i></i>
          </div>
          <a href="<?=APP_URL;?>/admin/docentes" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
          </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
              $contador_obrerosvigilantes = 0;
              foreach ($obrerosvigilantes as $obrerovigilante) {
                $contador_obrerosvigilantes = $contador_obrerosvigilantes + 1;
              }
              ?>
              <h3><?=$contador_obrerosvigilantes;?></h3>
              <p>Obreros/Vigilantes registrados</p>
          </div>
          <div class="icon">
            <i class="fas"><i class="bi bi-people-fill"></i></i>
          </div>
          <a href="<?=APP_URL;?>/admin/obrerovigilante" class="small-box-footer">
            Más información <i class="fas fa-arrow-circle-right"></i>
          </a>
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
include ('../admin/layout/parte2.php');
include ('../layout/mensajes.php');
?>