<?php 

$id_administrativos = $_GET['id'];
include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/administrativos/datos_administrativos.php');
include ('../../app/controllers/roles/listado_de_roles.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Personal administrativo: <?=$nombres." ".$apellidos;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/administrativos/update.php" method="POST">
               <div class="row">
               <div class="col-md-12">
               <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="id_administrativos" value="<?=$id_administrativos;?>" hidden>
                        <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
                        <input type="text" name="id_persona" value="<?=$id_persona;?>" hidden>
                        <label for="">Nombre del rol</label>
                        <div class="form-inline">
                            <select name="rol_id" id="" class="form-control" style="width: 198px">
                                <?php 
                        foreach ($roles as $role) { ?>
                            <option value="<?=$role['id_rol'];?>" <?=$nombre_rol==$role['nombre_rol'] ? 'selected': ''?>><?=$role['nombre_rol'];?></option>
                            <?php
                        }
                        ?>
                        </select>
                        <a href="<?=APP_URL;?>/admin/roles/create.php" style= "margin-left: 5px" class="btn btn-light"><i class="bi bi-plus-circle"></i></a>
                        </div>
                      </div>
                </div>

                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Nombres</label>
                        <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Apellidos</label>
                        <input type="text" name="apellidos" value="<?=$apellidos;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Correo electronico</label>
                        <input type="email" name="email" value="<?=$email;?>" class="form-control">
                      </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Cédula de identidad</label>
                        <input type="text" name="ci" value="<?=$ci;?>" class="form-control">
                      </div>
                 </div>
            <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" name="f_nacimiento" value="<?=$f_nacimiento;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="number" name="telefono" value="<?=$telefono;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Estatus</label>
                        <input type="text" name="estatus" value="<?=$estatus;?>" class="form-control">
                      </div>
                 </div>
            </div>
            <div class="row">
            <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Función</label>
                        <input type="text" name="funcion" value="<?=$funcion;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Código de cargo</label>
                        <input type="text" name="cod_cargo" value="<?=$cod_cargo;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Código de dependencia</label>
                        <input type="text" name="cod_dependencia" value="<?=$cod_dependencia;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Plantel</label>
                        <input type="text" name="plantel" value="<?=$plantel;?>" class="form-control">
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Horas trabajadas</label>
                        <input type="text" name="horas_trabajadas" value="<?=$horas_trabajadas;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Fecha de ingreso</label>
                        <input type="date" name="f_ingreso" value="<?=$f_ingreso;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Fecha de ingreso al plantel</label>
                            <input type="date" name="f_ingreso_plantel" value="<?=$f_ingreso_plantel;?>" class="form-control">
                          </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Años de servicio</label>
                        <input type="text" name="anos_servicio" value="<?=$anos_servicio;?>" class="form-control">
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Dirección</label>
                        <input type="text" name="direccion" value="<?=$direccion;?>" class="form-control">
                      </div>
                </div>
            </div>
               </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-warning" style="color:white">Actualizar</button>
                           <a href="<?= APP_URL;?>/admin/administrativos" class="btn btn-secondary">Cancelar</a>
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
