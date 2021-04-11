											 <!-- Circle Buttons -->
								<div class="container-fluid">
								<div class="row">
									<!-- Circle Buttons -->
								<div class="col-md-12 ">
								<div class="card shadow mb-3">
								<div class="card-header py-3 ">
								<h5 class="m-1 font-weight-bold text-info float-left">Inventario</h5>
								<button class="btn btn-success btn-icon-split float-right" id="add-stock">
								<span class="icon text-white-1" aria-hidden="true"><i class="fas fa-print"></i></span><span class="text">Imprimir</span>
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
                    <th><center>Lote</center></th>
                    <th><center>Fecha de expiración</center></th>
                    <th><center>Cantidad</center></th>
                                  
                              </tr>
                          </thead>
                          <tfoot>
                    <tr>
                    <th><center>Clave SSA</center></th>
                    <th><center>Descripción del producto</center></th>
                    <th><center>Presentación</center></th>
                    <th><center>Lote</center></th>
                    <th><center>Fecha de expiración</center></th>
                    <th><center>Cantidad</center></th>
                                     
                    </tr>
                  </tfoot>
                         
                          <tbody>
                            
                          <?php foreach($datos as $dato ) { ?>

<tr>
      <td> <?php echo $dato['SSA']; ?></td>
      <td> <?php echo $dato['desc_produc']; ?></td>
	  <td> <?php echo $dato['presentacion']; ?></td>
	  <td> <?php echo $dato['Lote']; ?></td>
      <td> <?php echo $dato['f_expira']; ?></td>
      <td> <?php echo $dato['cantidad']; ?></td>
            
      

<?php } ?>
  
</tbody>
                      </table>
                <!-- /.row -->
                
                </div>

</div>

            </div></div>    </div>
            <!-- /.container-fluid -->