<?php 

$id_usuario = $_GET["id"];

include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/usuarios/datos_del_usuario.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Usuario: <?=$email;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
              </div>
              <div class="card-body">
               <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nombre del rol</label>
                        <p class="form-control"><i class="bi bi-person-fill-add"></i>  <?=$nombre_rol;?></p>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Correo electronico</label>
                        <p class="form-control"><i class="bi bi-envelope-at-fill"></i>  <?=$email;?></p>
                      </div>
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Estado</label>
                        <p class="form-control"><i class="bi bi-power"></i>  <?php if ($estado == '1') echo "Activo"; else echo "Inactivo"; ?></p>
                      </div>
                </div>
                 </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <a href="<?= APP_URL;?>/admin/usuarios" class="btn btn-primary ml-4">Volver</a>
                      </div>
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
  <!-- /.content-wrapper -->

<?php 
include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');
?>