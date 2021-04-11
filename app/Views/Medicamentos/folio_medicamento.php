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
                    <th><center>Jefa/e</center></th>
                    <th><center>Colectivo</center></th>
                                  
                              </tr>
                          </thead>
                          <tfoot>
                    <tr>
                    <th><center>Folio</center></th>
                    <th><center>Jefa/e</center></th>
                    <th><center>Colectivo</center></th>
                    </tr>
                  </tfoot>
                         
                          <tbody>
                            
                          <?php foreach($rer as $dataingreso ) { ?>

<tr>
      <td> <?php echo $dataingreso['ID_RCM']; ?></td>
      <td> <?php echo $user_session->nom_per; echo ' '.$user_session->ape_per; ?></td>
      
      <td><center><a href= "<?php echo base_url(). '/Fpdf_cm/index/'. $dataingreso['ID_RCM']; ?>" class="btn btn-warning btn-icon-split btn-sm">Imprimir</a></center>
      
        </tr>
ss
<?php } ?>
  
</tbody>
                      </table>
                <!-- /.row -->
                
                </div>

</div>

            </div></div>    </div>
            <!-- /.container-fluid -->


