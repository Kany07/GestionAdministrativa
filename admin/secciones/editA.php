<?php 
$id_seccion=$_GET['id'];

include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
include ('../../app/controllers/secciones/datos_seccion_A.php');
?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Modificar estudiante: <?=$nombres;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/secciones/updateA.php" method="post">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-grup">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nombre del estudiante</label>
                        <input type="text" name="id_seccion" value="<?=$id_seccion;?>" hidden>
                        <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for="">Sección</label>
                        <select name="seccion" id="" class="form-control">
                        <option value="A" <?php if ($seccion == 'A'){ ?> selected="selected" <?php } ?>>A</option>
                        <option value="B"  <?php if ($seccion == 'B'){ ?> selected="selected" <?php } ?> disabled>B</option>
                        <option value="C"  <?php if ($seccion == 'C'){ ?> selected="selected" <?php } ?> disabled>C</option>
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
                                         <option value="<?=$nivele['id_nivel'];?>" <?=$nivele['nivel']=="PRIMERO" ? 'selected' : '';?> DISABLED><?=$nivele['nivel'];?></option>
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
                        <input type="text" name="c_estudiantil" value="<?=$c_estudiantil;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for="">Fecha de nacimiento</label>
                         <input type="date" name="f_nacimiento" value="<?=$f_nacimiento;?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Lugar de nacimiento</label>
                                <input type="text" name="lugar" value="<?=$lugar;?>" class="form-control">
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
                        <input type="text" name="edad" value="<?=$edad;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for="">Sexo</label>
                         <select name="sexo" id="" class="form-control">
                         <option value="FEMENINO" <?php if ($sexo == 'FEMENINO'){ ?> selected="selected" <?php } ?>>FEMENINO</option>
                          <option value="MASCULINO"  <?php if ($sexo == 'MASCULINO'){ ?> selected="selected" <?php } ?>>MASCULINO</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion" value="<?=$direccion;?>" class="form-control">
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
                        <input type="text" name="n_representante" value="<?=$n_representante;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for="">Cédula del representante</label>
                         <input type="text" name="c_representante" value="<?=$c_representante;?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Telefono del representante</label>
                                <input type="text" name="t_representante" value="<?=$t_representante;?>" class="form-control">
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
                           <button type="submit" class="btn btn-warning ml-4" style="color: white">Actualizar</button>
                           <a href="<?= APP_URL;?>/admin/secciones/indexA.php" class="btn btn-secondary">Cancelar</a>
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
