            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
              
        <div class="col-md-12 ">
        
        
            <div class="card shadow mb-3">
                
                <div class="card-header py-3 ">

                <h5 class="m-1 font-weight-bold text-info float-left">Ingreso de proveedor</h5>

                <button href="#" class="btn btn-info btn-icon-split float-right" id="" data-toggle="modal" data-target="#agregar_provModal" data-placement="top">
                    <span class="icon text-white-1" aria-hidden="true"><i class="fas fa-folder-plus"></i></span><span class="text">Agregar proveedor</span>
                </button>        
                        </div>
                           
                        <div class="card-body">
                        <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                    <th><center>Código proveedor</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Apellido</center></th>
                    <th><center>Teléfono</center></th>
                    <th><center>Empresa</center></th>
                    <th><center>Correo</center></th>
                    <th><center>Acción</center></th>
                                  
                              </tr>
                          </thead>
                          <tfoot>
                    <tr>
                    <th><center>Código proveedor</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Apellido</center></th>
                    <th><center>Teléfono</center></th>
                    <th><center>Empresa</center></th>
                    <th><center>Correo</center></th>
                    <th><center>Acción</center></th>
                  
                    </tr>
                  </tfoot>
                         
                          <tbody>
                            
                          <?php foreach($datos as $dato ) { ?>

<tr>
      <td><?php echo $dato['ID_PROV']; ?></td>
      <td><?php echo $dato['nom_prov']; ?></td>
      <td><?php echo $dato['ape_prov']; ?></td>
      <td><?php echo $dato['tel_prov']; ?></td>
      <td><?php echo $dato['empresa_prov']; ?></td>
      <td><?php echo $dato['correo_prov']; ?></td>

      
      <td>
      <center>
        <a onclick="getProduct('<?php echo $dato['ID_PROV']; ?>')" class="btn btn-warning btn-icon-split float-right btn-sm" id="openEditModal">
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
            <div class="modal fade" id="editar_proveModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editar_proveModalLabel">Editar proveedor</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="<?php echo base_url(); ?>/Proveedor/actualizar">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-12 col-sm-12">
                          <label class="control-label col-lg-12" for="">CODIGO:</label>
                          <input class="form-control form-group-lg" id="ID_PROV" name="ID_PROV" type="text" value="" readonly/>
                        </div>

                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">Nombre:</label>
                          <input class="form-control" id="nom_prov" name="nom_prov" type="text" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">Apellido:</label>
                          <input class="form-control" id="ape_prov" name="ape_prov" type="text" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">Edad:</label>
                          <input class="form-control" id="edad_prov" name="edad_prov" type="number" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">Telefono:</label>
                          <input class="form-control" id="tel_prov" name="tel_prov" type="number" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">Correo:</label>
                          <input class="form-control" id="correo_prov" name="correo_prov" type="email" value="" />
                        </div>
                        <div class="col-12 col-sm-6"><br>
                          <label class="control-label col-sm-3" for="">Empresa:</label>
                          <input class="form-control" id="empresa_prov" name="empresa_prov" type="text" value="" />
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
                  url: '<?php echo base_url(); ?>/Proveedor/searchById/' + ssa,
                  cache: false,
                  success: function(response) {
                    $("#ID_PROV").val(response.ID_PROV);
                    $("#nom_prov").val(response.nom_prov);
                    $("#ape_prov").val(response.ape_prov);
                    $("#edad_prov").val(response.edad_prov);
                    $("#tel_prov").val(response.tel_prov);
                    $("#correo_prov").val(response.correo_prov);
                    $("#empresa_prov").val(response.empresa_prov);
                    $("#fecha_alta").val(response.fecha_alta);
                    $("#fecha_edit").val(response.fecha_edit);
                    $("#editar_proveModal").modal("show");

                  }
                });

                return false;
              }

          </script>
