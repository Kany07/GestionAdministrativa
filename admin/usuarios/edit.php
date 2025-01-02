<?php  

$id_usuario = $_GET['id'];

include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/usuarios/datos_del_usuario.php');
include ('../../app/controllers/roles/listado_de_roles.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Modificar usuario: <?=$nombres;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/usuarios/update.php" method="post">
               <div class="row">
               <div class="col-md-12">
               <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
                        <input type="text" name="logo" value="<?=$logo;?>" hidden>
                        <label for="">Nombre del rol</label>
                        <div class="form-inline">
                            <select name="rol_id" id="" class="form-control" style="width: 291px">
                                <?php 
                        foreach ($roles as $role) { 
                            $nombre_rol_tabla = $role['nombre_rol'];?>
                            <option value="<?=$role['id_rol'];?>" <?php if($nombre_rol==$nombre_rol_tabla){ ?> selected="selected"<?php } ?>>
                                 <?=$role['nombre_rol'];?>
                            </option>
                            <?php
                        }
                        ?>
                        </select>
                        <a href="<?=APP_URL;?>/admin/roles/create.php" style= "margin-left: 5px" class="btn btn-light"><i class="bi bi-plus-circle"></i></a>
                        </div>
                      </div>
                </div>

                <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nombre del usuario</label>
                        <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Correo electrónico</label>
                        <input type="email" name="email" value="<?=$email;?>" class="form-control">
                      </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" name="password" class="form-control">
                      </div>
                 </div>
            <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Repetir contraseña</label>
                        <input type="password" name="password_repet" class="form-control">
                      </div>
                </div>
                  </div>
               </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-warning" style ="color: white">Actualizar</button>
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

