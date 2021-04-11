<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary"> <?php echo 
                  $titulo;?> </h4>

<div> 


  
                <p>  
<button href="#" class="btn btn-info btn-icon-split float-right" id="" data-toggle="modal" data-target="#agregar_usuModal" data-placement="top">
                    <span class="icon text-white-1" aria-hidden="true"><i class="fas fa-folder-plus"></i></span><span class="text">Agregar usuario</span>
                </button>        
                        </div>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                    <th><center>CURP</center></th>
                    <th><center>ID CARGO</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Apellidos</center></th>
                    <th><center>Email</center></th>
                    <th><center>Estatus</center></th>
                    <th><center>Acción</center></th>
                                  
                              </tr>
                          </thead>
                          <tfoot>
                    <tr>
                    <th><center>CURP</center></th>
                    <th><center>ID CARGO</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Apellidos</center></th>
                    <th><center>Email</center></th>
                    <th><center>Estatus</center></th>
                    <th><center>Acción</center></th>
                  
                    </tr>
                  </tfoot>
                         
                          <tbody>
                            
                          <?php foreach($datos as $usuario ) { ?>

<tr>
      <td><center><?php echo $usuario['CURP']; ?></center></td>
      <td><center><?php echo $usuario['ID_C']; ?></center></td>
      <td><center><?php echo $usuario['nom_per']; ?></center></td>
      <td><center><?php echo $usuario['ape_per']; ?></center></td>
      <td><center><?php echo $usuario['correo_per']; ?></center></td>
      <td><center><?php if ($usuario['Status']==1){echo 'Activo';}elseif($usuario['Status']==0){echo 'Inactivo';}  ?></center></td>
          
      <td>
      <center>
        <a onclick="getProduct('<?php echo $usuario['CURP']; ?>')" class="btn btn-warning btn-icon-split float-right btn-sm" id="openEditModal">
          <span class="icon text-white-50" aria-hidden="true">
            <i class="fas fa-edit"></i>
          </span>
          <span class="text"> Editar</span>
        </>
      </center>
    </td>
        </tr>
                                     
<?php } ?>
  
</tbody>
                      </table>
                <!-- /.row -->
                
                </div>

</div>

            </div></div>    </div>
            <!-- /.container-fluid -->
<div class="modal fade" id="editar_usuarioModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editar_usuarioModalLabel">Editar proveedor</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="<?php echo base_url(); ?>/Usuarios/actualizar">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-12 col-sm-12">
                          <label class="control-label col-lg-12" for="">CURP:</label>
                          <input class="form-control form-group-lg" id="CURP" name="CURP" type="text" value="" readonly/>
                        </div>

                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">CEDULA:</label>
                          <input class="form-control" id="cedu_per" name="cedu_per" type="text" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">NOMBRE:</label>
                          <input class="form-control" id="nom_per" name="nom_per" type="text" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">APELLIDO:</label>
                          <input class="form-control" id="ape_per" name="ape_per" type="text" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">CORREO:</label>
                          <input class="form-control" id="correo_per" name="correo_per" type="email" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">EDAD:</label>
                          <input class="form-control" id="edad_per" name="edad_per" type="text" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">ESTATUS:</label>
                          <select class="form-control" id="Status" name="Status" type="text" value="" required>
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                          </select>
                        </div>
                      </div>
                    </div>


                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                      <button class="btn btn-info" type="submit">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script>
            // openEditModal
            function getProduct(ssa) {
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Usuarios/searchById/' + ssa,
                  cache: false,
                  success: function(response) {
                    $("#CURP").val(response.CURP);
                    $("#cedu_per").val(response.cedu_per);
                    $("#nom_per").val(response.nom_per);
                    $("#ape_per").val(response.ape_per);
                    $("#correo_per").val(response.correo_per);
                    $("#edad_per").val(response.edad_per);
                    $("#Status").val(response.Status);
                    $("#editar_usuarioModal").modal("show");

                  }
                });

                return false;
              }

          </script>
