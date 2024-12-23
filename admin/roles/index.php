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
        <h1>Listado de roles</h1>
        </div>
        <div class="row">
          <div class = "col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Roles registrados</h3>
                <div class="card-tools">
                  <a href="create.php" class="btn btn-dark"><i class="bi bi-plus-circle"></i>   Nuevo rol</a>
                </div>
              </div>
              <div class="card-body">
          <table class = "table table-striped table-bordered table-hover table-sm">
          <thead>
            <tr>
              <th style="text-align: center">Nro</th>
              <th style="text-align: center">Nombre del rol</th>
              <th style="text-align: center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_rol = 0;
            foreach ($roles as $role) {
              $id_rol = $role['id_rol'];
              $contador_rol = $contador_rol + 1; ?>
              <tr>
                <td style="text-align: center"><?=$contador_rol;?></td>
                <td><?=$role['nombre_rol'];?></td>
                <td style="text-align: center">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
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