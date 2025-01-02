<?php 
$id_config_institucion = $_GET['id'];

include ('../../../app/config.php'); 
include ('../../../admin/layout/parte1.php');

include ('../../../app/controllers/configuraciones/institucion/datos_institucion.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1><?=$nombre_institucion;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
              </div>
              <div class="card-body">
               <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de la institución</label>
                                <p class="form-control"><i class="bi bi-hospital-fill"></i>  <?=$nombre_institucion;?></p>
                            </div>
                        </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <p class="form-control"><i class="bi bi-telephone-fill"></i> <?=$telefono;?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <p class="form-control"><i class="bi bi-geo-alt-fill"></i> <?=$direccion;?></p>
                            </div>
                        </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Redes sociales</label>
                                    <p class="form-control"><i class="bi bi-facebook"></i> <?=$redes_sociales;?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Correo electrónico</label>
                                <p class="form-control"><i class="bi bi-envelope-at-fill"></i> <?=$correo;?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Código postal</label>
                                <p class="form-control"><i class="bi bi-geo-fill"></i> <?=$codigo_postal;?></p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Código DEA</b></label>
                                <p class="form-control"><i class="bi bi-regex"></i> <?=$codigo_dea;?></p>
                            </div>
                        </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Código Administrativo</label>
                                    <p class="form-control"><i class="bi bi-regex"></i> <?=$codigo_administrativo;?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Código estadistico</label>
                                <p class="form-control"><i class="bi bi-regex"></i> <?=$codigo_estadistico;?></p>
                            </div>
                        </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="">RIF</label>
                                    <p class="form-control"><i class="bi bi-upc"></i> <?=$rif;?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="">Territorio</label>
                                     <p class="form-control"><i class="bi bi-regex"></i> <?=$territorio;?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label for=""><i class="bi bi-chat-square-text-fill"></i>  Reseña de la institución</label>
                                     <textarea class="form-control"><?=$resena;?></textarea>
                                </div>
                            </div>
                        </div> 
                      </div>
                      <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                 <label for="">Logo</label>
                                 <br>
                                 <br>
                                 <center> <img src="<?=APP_URL."/public/images/configuracion/".$logo;?>" width="250px" alt=""></center>
                            </div>
                            </div>
                        </div>
                      </div>
                </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <a href="<?= APP_URL;?>/admin/configuraciones/institucion" class="btn btn-primary">Volver</a>
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
include ('../../../admin/layout/parte2.php');
include ('../../../layout/mensajes.php');
?>

<script>
    function archivo(evt){
        var files = evt.target.files;
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    document.getElementById('list').innerHTML = ['<img class="thumbnail" src="',e.target.result,'" width="300px" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
        
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>