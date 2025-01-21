<?php 
$id_seccion=$_GET['id'];

include ('../../app/config.php'); 
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
include ('../../app/controllers/secciones/datos_seccion_C.php');
include ('../../app/controllers/configuraciones/gestion/listado_de_gestiones.php');
?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Modificar estudiante: <?=$nombres." ".$apellidos;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <form action="<?= APP_URL;?>/app/controllers/secciones/updateC.php" method="post">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Llene los datos del estudiante</h3>
              </div>
              <div class="card-body">
              <div class="row">
              <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nombres</label>
                        <input type="text" name="id_seccion" value="<?=$id_seccion;?>" hidden>
                        <input type="text" name="id_gestion" value="<?=$id_gestion;?>" hidden>
                        <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Apellidos</label>
                        <input type="text" name="apellidos" value="<?=$apellidos;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                         <label for="">Fecha de nacimiento</label>
                         <input type="date" name="f_nacimiento" value="<?=$f_nacimiento;?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="from-group">
                        <label for="">Lugar de nacimiento</label>
                        <input type="text" name="lugar" value="<?=$lugar;?>" class="form-control">
                    </div>
                </div>
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
            </div>
            <div class="row">
            <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion" value="<?=$direccion;?>" class="form-control">
                            </div>
                    </div>
                </div>
            </div>
           </div>
       </div>
        <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Llene los datos acádemicos del estudiante</h3>
              </div>
              <div class="card-body">
              <div class="row">
              <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Cédula estudiantil</label>
                        <input type="text" name="c_estudiantil" value="<?=$c_estudiantil;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-3">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Turno</label>
                                <select name="turnos" id="" class="form-control">
                         <option value="MAÑANA" <?php if ($turnos == 'MAÑANA'){ ?> selected="selected" <?php } ?>>MAÑANA</option>
                         <option value="TARDE"  <?php if ($turnos == 'TARDE'){ ?> selected="selected" <?php } ?>>TARDE</option>
                        </select>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="form-group">
                         <label for="">Sección</label>
                         <select name="seccion" id="" class="form-control">
                        <option value="A" <?php if ($seccion == 'A'){ ?> selected="selected" <?php } ?>>A</option>
                        <option value="B"  <?php if ($seccion == 'B'){ ?> selected="selected" <?php } ?>>B</option>
                        <option value="C"  <?php if ($seccion == 'C'){ ?> selected="selected" <?php } ?>>C</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Niveles</label>
                                <select name="nivel_id" id="" class="form-control">
                                <?php
                                    foreach($niveles as $nivele){
                                       ?>
                                         <option value="<?=$nivele['id_nivel'];?>" <?=$nivel_id == $nivele['id_nivel'] ? 'selected' : ''?>><?=$nivele['nivel'];?></option>
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
        </div>
        <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Llene los datos del representante</h3>
              </div>
              <div class="card-body">
              <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nombres del representante</label>
                        <input type="text" name="n_representante" value="<?=$n_representante;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Apellidos del representante</label>
                        <input type="text" name="a_representante" value="<?=$a_representante;?>" class="form-control">
                      </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                         <label for="">Cédula del representante</label>
                         <input type="text" name="c_representante" value="<?=$c_representante;?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
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
        <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <button type="submit" class="btn btn-warning ml-4" style="color: white;">Registrar</button>
                           <a href="<?= APP_URL;?>/admin/secciones/indexC.php" class="btn btn-secondary">Cancelar</a>
                      </div>
                </div>
              </div>
      </form>
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