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
        <h1>Creación de un nuevo rol</h1>
        </div>
        <div class="row">
          <div class = "col-md-6">
            <div class="card card-outline card-dark">
              <div class="card-header">
                <h3 class="card-title">Llene el campo</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/roles/create.php" method="post">
               <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Nombre del rol</label>
                        <input type="text" name="nombre_rol" class="form-control" required>
                      </div>
                </div>
              </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-dark">Registrar</button>
                           <a href="<?= APP_URL;?>/admin/roles" class="btn btn-secondary">Cancelar</a>
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