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
        <h1>Estudiante: <?=$nombres;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
              </div>
              <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-grup">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for=""><i class="bi bi-person-arms-up"></i> Nombre del estudiante</label>
                        <p class="form-control"><?=$nombres;?></p>
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for=""><i class="bi bi-alphabet"></i> Sección</label>
                         <p class="form-control"><?=$seccion;?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-reception-3"></i> Niveles</label>
                                <p class="form-control"><?=$nivel;?></p>
                            </div>
                    </div>
                </div>
                </div>
               </div>
               <div class="form-grup">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for=""><i class="bi bi-backpack2-fill"></i> Cédula estudiantil</label>
                        <p class="form-control"><?=$c_estudiantil;?></p>
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for=""><i class="bi bi-calendar-date"></i> Fecha de nacimiento</label>
                         <p class="form-control"><?=$f_nacimiento;?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-geo-fill"></i> Lugar de nacimiento</label>
                                <p class="form-control"><?=$lugar;?></p>
                            </div>
                    </div>
                </div>
                </div>
               </div>
               <div class="form-grup">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for=""><i class="bi bi-123"></i> Edad</label>
                        <p class="form-control"><?=$edad;?></p>
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for=""><i class="bi bi-gender-ambiguous"></i> Sexo</label>
                         <p class="form-control"><?=$sexo;?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-geo-alt-fill"></i> Dirección</label>
                                <p class="form-control"><?=$direccion;?></p>
                            </div>
                    </div>
                </div>
                </div>
               </div>
               <div class="form-grup">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for=""><i class="bi bi-person-standing"></i> Nombre del representante</label>
                        <p class="form-control"><?=$n_representante;?></p>
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for=""><i class="bi bi-person-vcard-fill"></i> Cédula del representante</label>
                         <p class="form-control"><?=$c_representante;?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for=""><i class="bi bi-telephone-fill"></i> Teléfono del representante</label>
                                <p class="form-control"><?=$t_representante;?></p>
                            </div>
                    </div>
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
