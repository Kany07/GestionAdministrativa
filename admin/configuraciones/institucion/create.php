<?php 
include ('../../../app/config.php'); 
include ('../../../admin/layout/parte1.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Registro de datos</h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-dark">
              <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/configuraciones/institucion/create.php" method="post" enctype="multipart/form-data">
               
               <div class="row">
                    
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de la institución <b style="color: red">*</b></label>
                                <input type="text" name="nombre_institucion" class="form-control" required>
                            </div>
                        </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input type="number" name="telefono" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Redes sociales</label>
                                    <input type="text" name="redes_sociales" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Correo electrónico <b style="color: red">*</b></label>
                                <input type="email" name="correo" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Codigo postal</label>
                                <input type="text" name="codigo_postal" class="form-control">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Codigo DEA <b style="color: red">*</b></label>
                                <input type="text" name="codigo_dea" class="form-control" required>
                            </div>
                        </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Codigo Administrativo</label>
                                    <input type="text" name="codigo_administrativo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Codigo estadistico</label>
                                <input type="text" name="codigo_estadistico" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="">RIF <b style="color: red">*</b></label>
                                    <input type="text" name="rif" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="">Territorio</b></label>
                                    <input type="text" name="territorio" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label for="">Reseña de la institución</label>
                                     <textarea type="text" name="resena" class="form-control"></textarea>
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
                                 <center><output id="list"></output></center>
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