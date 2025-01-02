<?php 
include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/configuraciones/gestion/listado_de_gestiones.php');
?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Registro de un nuevo nivel</h1>
        </div>
        <div class="row">
          <div class = "col-md-8">
            <div class="card card-outline card-dark">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/niveles/create.php" method="post">
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Gestión academica</label>
                                <select name="gestion_id" id="" class="form-control">
                                    <?php
                                    foreach($gestiones as $gestione){ 
                                        if ($gestione['estado']=="1") { ?>
                                         <option value="<?=$gestione['id_gestion'];?>"><?=$gestione['gestion'];?></option>
                                        <?php    
                                        }
                                        ?>     
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Niveles</label>
                                <select name="nivel" id="" class="form-control">
                                    <option value="PRIMERO">PRIMERO</option>
                                    <option value="SEGUNDO">SEGUNDO</option>
                                    <option value="TERCERO">TERCERO</option>
                                </select>
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Turno</label>
                                <select name="turno" id="" class="form-control">
                                    <option value="MAÑANA">MAÑANA</option>
                                    <option value="TARDE">TARDE</option>
                                    <option value="NOCHE">NOCHE</option>
                                </select>
                            </div>
                    </div>
                </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-dark">Actualizar</button>
                           <a href="<?= APP_URL;?>/admin/niveles" class="btn btn-secondary">Cancelar</a>
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
