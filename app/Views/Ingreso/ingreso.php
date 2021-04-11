            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
              
        <div class="col-md-12 ">
        
        
            <div class="card shadow mb-3">
                
                <div class="card-header py-3 ">

                <h5 class="m-1 font-weight-bold text-info float-left">Ingreso de productos</h5>

                <button href="#" class="btn btn-info btn-icon-split float-right" id="" data-toggle="modal" data-target="#agregar_infoproductModal" data-placement="top">
                    <span class="icon text-white-1" aria-hidden="true"><i class="fas fa-folder-plus"></i></span><span class="text">Agregar producto</span>
                </button>        
                        </div>
                           
                        <div class="card-body">
                        <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                    <th><center>Clave SSA</center></th>
                    <th><center>Descripción del producto</center></th>
                    <th><center>Presentación</center></th>
                    <th><center>Cantidad</center></th>
                    <th><center>Lote</center></th>
                    <th><center>Fecha de caducidad</center></th>
                    <th><center>Fecha de recepción</center></th>
                                  
                              </tr>
                          </thead>
                          <tfoot>
                    <tr>
                    <th><center>Clave SSA</center></th>
                    <th><center>Descripción del producto</center></th>
                    <th><center>Presentación</center></th>
                    <th><center>Cantidad</center></th>
                    <th><center>Lote</center></th>
                    <th><center>Fecha de caducidad</center></th>
                    <th><center>Fecha de recepción</center></th>
                  
                    </tr>
                  </tfoot>
                         
                          <tbody>
                            
                          <?php foreach($dataingr as $dataingreso ) { ?>

<tr>
      <td> <?php echo $dataingreso['SSA']; ?></td>
      <td> <?php echo $dataingreso['desc_produc']; ?></td>
      <td> <?php echo $dataingreso['presentacion']; ?></td>
      <td> <?php echo $dataingreso['cantidad']; ?></td>
      <td> <?php echo $dataingreso['lote']; ?></td>
      <td> <?php echo $dataingreso['f_expira']; ?></td>
      <td> <?php echo $dataingreso['f_entrada']; ?></td>
      
        </tr>

<?php } ?>
  
</tbody>
                      </table>
                <!-- /.row -->
                
                </div>

</div>

            </div></div>    </div>
            <!-- /.container-fluid -->

