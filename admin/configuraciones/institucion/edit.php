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
        <h2>Modificar datos: <?= $nombre_institucion;?></h2>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/configuraciones/institucion/update.php" method="post" enctype="multipart/form-data">
               
               <div class="row">
                    
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="id_config_institucion" value="<?=$id_config_institucion;?>" hidden>
                                <input type="text" name="logo" value="<?=$logo;?>" hidden>
                                <label for="">Nombre de la institución</label>
                                <input type="text" name="nombre_institucion" value="<?=$nombre_institucion;?>" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input type="text" name="telefono" value="<?=$telefono;?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion" value="<?=$direccion;?>" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Redes sociales</label>
                                    <input type="text" name="redes_sociales" value="<?=$redes_sociales;?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Correo electrónico</label>
                                <input type="email" name="correo" value="<?=$correo;?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Codigo postal</label>
                                <input type="text" name="codigo_postal" value="<?=$codigo_postal;?>" class="form-control">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Codigo DEA</label>
                                <input type="text" name="codigo_dea" value="<?=$codigo_dea;?>" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Codigo Administrativo</label>
                                    <input type="text" name="codigo_administrativo" value="<?=$codigo_administrativo;?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Codigo estadistico</label>
                                <input type="text" name="codigo_estadistico" value="<?=$codigo_estadistico;?>" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="">RIF</label>
                                    <input type="text" name="rif" value="<?=$rif;?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="">Territorio</label>
                                    <input type="text" name="territorio" value="<?=$territorio;?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label for="">Reseña de la institución</label>
                                     <textarea type="text" name="resena" class="form-control"><?=$resena;?></textarea>
                                </div>
                            </div>
                        </div>
                        
                      </div>

                      <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                 <label for="">Logo</label>
                                 <input type="file" id="file" name="file" class="form-control">
                                 <br>
                                <center>
                                 <output id="list">
                                   <img src="<?=APP_URL."/public/images/configuracion/".$logo;?>" width="250px" alt="">
                                 </output>
                                </center>
                            </div>
                            </div>
                        </div>
                      </div>
                </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-warning" style="color: white">Actualizar</button>
                           <a href="<?= APP_URL;?>/admin/configuraciones/institucion" class="btn btn-secondary">Cancelar</a>
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