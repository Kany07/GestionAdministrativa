<?php 
$id_seccion=$_GET['id'];

include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/secciones/datos_seccion_B.php');
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Datos del estudiante: <?=$nombres." ".$apellidos;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos del estudiante</h3>
              </div>
              <div class="card-body">
              <div class="row">
              <div class="col-md-4">
                      <div class="form-group">
                        <label for=""><i class="bi bi-person-arms-up"></i> Nombres</label>
                        <p type="text" name="nombres" class="form-control"><?=$nombres;?></p>
                      </div>
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                        <label for=""><i class="bi bi-person-arms-up"></i> Apellidos</label>
                        <p type="text" name="apellidos" class="form-control"><?=$apellidos;?></p>
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for=""><i class="bi bi-calendar-date"></i> Fecha de nacimiento</label>
                         <p type="date" name="f_nacimiento" class="form-control"><?=$f_nacimiento;?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="from-group">
                        <label for=""><i class="bi bi-geo-fill"></i> Lugar de nacimiento</label>
                        <p type="text" name="lugar" class="form-control"><?=$lugar;?></p>
                    </div>
                </div>
                 <div class="col-md-4">
                      <div class="form-group">
                        <label for=""><i class="bi bi-123"></i> Edad</label>
                        <p type="text" name="edad" class="form-control"><?=$edad;?></p>
                      </div>
                </div>
              <div class="col-md-4">
                     <div class="form-group">
                      <label for=""><i class="bi bi-gender-ambiguous"></i> Sexo</label>
                        <p type="text" name="sexo" class="form-control"><?=$sexo;?></p>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-geo-alt-fill"></i> Dirección</label>
                                <p type="text" name="direccion" class="form-control"><?=$direccion;?></p>
                            </div>
                    </div>
                </div>
            </div>
           </div>
       </div>
        <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos acádemicos del estudiante</h3>
              </div>
              <div class="card-body">
              <div class="row">
              <div class="col-md-3">
                      <div class="form-group">
                        <label for=""><i class="bi bi-backpack2-fill"></i> Cédula estudiantil</label>
                        <p type="text" name="c_estudiantil" class="form-control"><?=$c_estudiantil;?></p>
                      </div>
                </div>
                <div class="col-md-3">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-clock-history"></i> Turno</label>
                                <p type="text" name="turnos" class="form-control"><?=$turnos;?></p>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="form-group">
                         <label for=""><i class="bi bi-alphabet"></i> Sección</label>
                        <p type="text" name="seccion" class="form-control"><?=$seccion;?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-reception-3"></i> Nivel</label>
                                <p type="text" name="nivel" class="form-control"><?=$nivel;?></p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                  <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><i class="bi bi-person-workspace"></i> Gestión academica</label>
                               <p type="text" name="gestion" class="form-control"><?=$gestion;?></p>
                            </div>
                  </div>
                </div>
          </div>
        </div>
        <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos del representante</h3>
              </div>
              <div class="card-body">
              <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""><i class="bi bi-person-standing"></i> Nombres del representante</label>
                        <p type="text" name="n_representante" class="form-control"><?=$n_representante;?></p>
                      </div>
                </div>
                <div class="col-md-6">
                      <div class="form-group">
                        <label for=""><i class="bi bi-person-standing"></i> Apellidos del representante</label>
                        <p type="text" name="a_representante" class="form-control"><?=$a_representante;?></p>
                      </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                         <label for=""><i class="bi bi-person-vcard-fill"></i> Cédula del representante</label>
                         <p type="text" name="c_representante" class="form-control"><?=$c_representante;?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-telephone-fill"></i> Telefono del representante</label>
                                <p type="text" name="t_representante" class="form-control"><?=$t_representante;?></p>
                            </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <a href="<?= APP_URL;?>/admin/secciones/indexB.php" class="btn btn-primary ml-4">Volver</a>
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
</div>
<?php 
include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');
?>