<?php 
include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/roles/listado_de_roles.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Creación de un nuevo usuario</h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-dark">
              <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/usuarios/create.php" method="post">
               <div class="row">
               <div class="col-md-12">
               <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nombre del rol</label>
                        <div class="form-inline">
                            <select name="rol_id" id="" class="form-control" style="width: 462px">
                                <?php 
                        foreach ($roles as $role) { ?>
                            <option value="<?=$role['id_rol'];?>"><?=$role['nombre_rol'];?></option>
                            <?php
                        }
                        ?>
                        </select>
                        <a href="<?=APP_URL;?>/admin/roles/create.php" style= "margin-left: 5px" class="btn btn-light"><i class="bi bi-plus-circle"></i></a>
                        </div>
                      </div>
                </div>

                <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Correo electronico</label>
                        <input type="email" name="email" class="form-control" required>
                      </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                      </div>
                 </div>
            <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Repetir contraseña</label>
                        <input type="password" name="password_repet" class="form-control" required>
                      </div>
                </div>
            </div>
               </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-dark">Registrar</button>
                           <a href="<?= APP_URL;?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
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
