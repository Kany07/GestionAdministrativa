<?php 
$id_gestion = $_GET['id'];
include ('../../../app/config.php'); 
include ('../../../admin/layout/parte1.php');
include ('../../../app/controllers/configuraciones/gestion/datos_gestion.php');
?>   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Modificar: GESTIÓN <?=$gestion;?>
        </h1>
        </div>
        <div class="row">
          <div class = "col-md-8">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/configuraciones/gestion/update.php" method="post">
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <input type="text" name="id_gestion" value="<?=$id_gestion;?>" hidden>
                                <label for="">Gestión académica</label>
                                <input type="text" name="gestion" value="<?=$gestion;?>" class="form-control" placeholder="Año">
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado" id="" class="form-control">
                                    <?php
                                    if ($estado == "1"){?>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                    <?php }else{ ?>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO" selected="selected">INACTIVO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                    </div>
                </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-warning" style="color: white;">Actualizar</button>
                           <a href="<?= APP_URL;?>/admin/configuraciones/gestion" class="btn btn-secondary">Cancelar</a>
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