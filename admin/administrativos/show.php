<?php 

$id_administrativos = $_GET['id'];
include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/administrativos/datos_administrativos.php');
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
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos registados</h3>
              </div>
              <div class="card-body">
               <div class="row">
               <div class="col-md-12">
               <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Nombre del rol</label>
                        <p type="text" name="nombre_rol" class="form-control"><i class="bi bi-person-circle"></i> <?=$nombre_rol;?></p>
                      </div>
                </div>

                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Nombres</label>
                        <p type="text" name="nombres" class="form-control"><i class="bi bi-person-fill"></i> <?=$nombres;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Apellidos</label>
                        <p type="text" name="apellidos" class="form-control"><i class="bi bi-person-fill"></i> <?=$apellidos;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Correo electronico</label>
                        <p type="email" name="email" class="form-control"><i class="bi bi-envelope-at-fill"></i> <?=$email;?></p>
                      </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Cédula de identidad</label>
                        <p type="number" name="ci" class="form-control"><i class="bi bi-person-vcard"></i> <?=$ci;?></p>
                      </div>
                 </div>
            <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Fecha de nacimiento</label>
                        <p type="date" name="f_nacimiento" class="form-control"><i class="bi bi-calendar-date"></i> <?=$f_nacimiento;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Teléfono</label>
                        <p type="number" name="telefono" class="form-control"><i class="bi bi-telephone-fill"></i> <?=$telefono;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Estatus</label>
                        <p type="text" name="estatus" class="form-control"><i class="bi bi-card-heading"></i> <?=$estatus;?></p>
                      </div>
                 </div>
            </div>
            <div class="row">
            <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Función</label>
                        <p type="text" name="funcion" class="form-control"><i class="bi bi-clipboard2-minus"></i> <?=$funcion;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Código de cargo</label>
                        <p type="text" name="cod_cargo" class="form-control"><i class="bi bi-braces-asterisk"></i> <?=$cod_cargo;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Código de dependencia</label>
                        <p type="text" name="cod_dependencia" class="form-control"><i class="bi bi-braces-asterisk"></i> <?=$cod_dependencia;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Plantel</label>
                        <p type="text" name="plantel" class="form-control"><i class="bi bi-building-fill"></i> <?=$plantel;?></p>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Horas trabajadas</label>
                        <p type="number" name="horas_trabajadas" class="form-control"><i class="bi bi-clock-history"></i> <?=$horas_trabajadas;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Fecha de ingreso</label>
                        <p type="date" name="f_ingreso" class="form-control"><i class="bi bi-calendar-event"></i> <?=$f_ingreso;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Fecha de ingreso al plantel</label>
                            <p type="date" name="f_ingreso_plantel" class="form-control"><i class="bi bi-calendar-event"></i> <?=$f_ingreso_plantel;?></p>
                          </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Años de servicio</label>
                        <p type="text" name="anos_servicio" class="form-control"><i class="bi bi-calendar3"></i> <?=$anos_servicio;?></p>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Dirección</label>
                        <p type="text" name="direccion" class="form-control"><i class="bi bi-geo-alt-fill"></i> <?=$direccion;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Fecha y hora de creación</label>
                    <p type="text" name="fyh_creacion" class="form-control"><i class="bi bi-calendar-plus"></i> <?=$fyh_creacion;?></p>
                  </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Estado</label>
                        <p type="text" name="estado" class="form-control"><i class="bi bi-power"></i> 
                        <?php
                        if($estado == '1') echo "ACTIVO";
                        else echo "INACTIVO";
                        ?>
                        </p>
                      </div>
                </div>
            </div>
               </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <a href="<?= APP_URL;?>/admin/administrativos" class="btn btn-primary">Volver</a>
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
  </div>
  <!-- /.content-wrapper -->

<?php 
include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');
?>
