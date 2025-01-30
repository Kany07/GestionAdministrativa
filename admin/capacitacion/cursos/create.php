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
        <h1>Registro de cursos <?=$year_actual;?></h1>
        </div>
        <div class="row">
          <div class = "col-md-8">
            <div class="card card-outline card-dark">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
              </div>
              <div class="card-body">
               <form action="<?= APP_URL;?>/app/controllers/capacitacion/cursos/create.php" method="post">
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Nombre del curso <b style="color: red">*</b></label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" name="descripcion" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Nombre del instructor</label>
                                <input type="text" name="instructor" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Fecha de inicio</label>
                                <input type="date" name="fecha" class="form-control">
                            </div>
                    </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                    <div class="from-group">
                            <div class="form-group">
                                <label for="">Duracion</label>
                                <input type="text" name="duracion" class="form-control">
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
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                </select>
                            </div>
                    </div>
                </div>
               </div>
               </div>
              <hr>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                           <button type="submit" class="btn btn-dark ml-4">Registrar</button>
                           <a href="<?= APP_URL;?>/admin/capacitacion/cursos/index.php" class="btn btn-secondary">Cancelar</a>
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
 
  <!-- /.content-wrapper -->

<?php 
include ('../../../admin/layout/parte2.php');
include ('../../../layout/mensajes.php');
?>
