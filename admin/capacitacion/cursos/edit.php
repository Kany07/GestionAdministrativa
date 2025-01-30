<?php 
$id_cursos = $_GET['id'];
include ('../../../app/config.php'); 
include ('../../../admin/layout/parte1.php');
include ('../../../app/controllers/capacitacion/cursos/datos_capacitaciones.php');
?>   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Modificar curso
        </h1>
        </div>
        <div class="row">
          <div class = "col-md-8">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Actualice los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/capacitacion/cursos/update.php" method="post">
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Nombre del curso</label>
                                <input type="text" name="id_cursos" value="<?=$id_cursos;?>" hidden>
                                <input type="text" name="nombre" value="<?=$nombre;?>" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" name="descripcion" value="<?=$descripcion;?>" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Nombre del instructor</label>
                                <input type="text" name="instructor" value="<?=$instructor;?>" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Fecha de inicio</label>
                                <input type="date" name="fecha" value="<?=$fecha;?>" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Duracion</label>
                                <input type="text" name="duracion" value="<?=$duracion;?>" class="form-control">
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
                           <a href="<?= APP_URL;?>/admin/capacitacion/cursos/index.php" class="btn btn-secondary">Cancelar</a>
                      </div>
                </div>
              </div>
               </form>
               </div>
            </div>
          </div>
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   

<?php 
include ('../../../admin/layout/parte2.php');
include ('../../../layout/mensajes.php');
?>