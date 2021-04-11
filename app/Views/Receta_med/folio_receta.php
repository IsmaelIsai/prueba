            <?php 
$user_session = session(); 
?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
              
        <div class="col-md-12 ">
        
        
            <div class="card shadow mb-3">
                
                        <div class="card-body">
                        <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                    <th><center>Folio</center></th>
                    <th><center>Médico</center></th>
                    <th><center>Receta</center></th>
                                  
                              </tr>
                          </thead>
                          <tfoot>
                    <tr>
                    <th><center>Folio</center></th>
                    <th><center>Médico</center></th>
                    <th><center>Receta</center></th>
                    </tr>
                  </tfoot>
                         
                          <tbody>
                            
                          <?php foreach($rer as $dataingreso ) { ?>

<tr>
      <td> <?php echo $dataingreso['ID_RECETA']; ?></td>
      <td> <?php echo $user_session->nom_per; echo ' '.$user_session->ape_per; ?></td>
      
      <td><center><a href= "<?php echo base_url(). '/Fpdf/index/'. $dataingreso['ID_RECETA']; ?>" class="btn btn-warning btn-icon-split btn-sm">Imprimir</a></center>
      
        </tr>

<?php } ?>
  
</tbody>
                      </table>
                <!-- /.row -->
                
                </div>

</div>

            </div></div>    </div>
            <!-- /.container-fluid -->


