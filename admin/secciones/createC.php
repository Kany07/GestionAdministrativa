<?php 
include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/niveles/listado_de_niveles.php');
?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Registro de estudiante</h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-dark">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/secciones/createC.php" method="post">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-grup">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nombre del estudiante</label>
                        <input type="text" name="nombres" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for="">Sección</label>
                        <select name="seccion" id="" class="form-control">
                        <option value="C">C</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Niveles</label>
                                <select name="nivel_id" id="" class="form-control">
                                    <?php
                                    foreach($niveles as $nivele){ 
                                        ?>
                                         <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel'];?></option>
                                        <?php    
                                       }
                                    ?>
                                </select>
                            </div>
                    </div>
                </div>
                </div>
               </div>
               <div class="form-grup">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Cédula estudiantil</label>
                        <input type="text" name="c_estudiantil" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for="">Fecha de nacimiento</label>
                         <input type="date" name="f_nacimiento" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Lugar de nacimiento</label>
                                <input type="text" name="lugar" class="form-control">
                            </div>
                    </div>
                </div>
                </div>
               </div>
               <div class="form-grup">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Edad</label>
                        <input type="text" name="edad" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for="">Sexo</label>
                         <select name="sexo" id="" class="form-control">
                        <option value="---">---</option>
                        <option value="FEMENINO">FEMENINO</option>
                        <option value="MASCULINO">MASCULINO</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion" class="form-control">
                            </div>
                    </div>
                </div>
                </div>
               </div>
               <div class="form-grup">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nombre del representante</label>
                        <input type="text" name="n_representante" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for="">Cédula del representante</label>
                         <input type="text" name="c_representante" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Telefono del representante</label>
                                <input type="text" name="t_representante" class="form-control">
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
                           <button type="submit" class="btn btn-dark ml-4">Actualizar</button>
                           <a href="<?= APP_URL;?>/admin/secciones/indexC.php" class="btn btn-secondary">Cancelar</a>
                      </div>
                </div>
              </div>
               </form>
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
