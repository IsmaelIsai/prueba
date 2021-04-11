
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
              
        <div class="col-md-12 ">
        
        
            <div class="card shadow mb-3">
                
                <div class="card-header py-3 ">

                <h5 class="m-1 font-weight-bold text-info float-left">Entrega de medicamentos</h5>
                <form action="<?php echo base_url(); ?>/Salidas" autocomplete="off" method="POST">
                <button href="" class="btn btn-info btn-icon-split float-right" data-placement="top">
                    <span class="icon text-white-1" aria-hidden="true"></span><span class="text">Regresar</span>
                </button>
                </form>     
                        </div>
                           
                        <div class="card-body">
                        <div class="table-responsive">
                      <form action="<?php echo base_url(); ?>/S_medicamento/actualizar" autocomplete="off" method="POST">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                                    <tr>
                                      <th>FOLIO</th>
                                      <th>SSA</th>
                                      <th>Solicitud</th>
                                      <th>Existencia</th>
                                      <th>Cantidad surtida</th>
                                      <th>Surtir</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>FOLIO</th>
                                      <th>SSA</th>
                                      <th>Solicitud</th>
                                      <th>Existencia</th>
                                      <th>Cantidad surtida</th>
                                      <th>Surtir</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                                      
                                  <?php
                                  $nombre=0;
                                  $SSA=12;
                                  $RECETA=24;
                                   foreach($datos as $dataingreso ) { ?>

                          <tr>
                            <td><input type="int"  name="<?php echo $RECETA ?>" id="<?php echo $RECETA ?>" value="<?php echo $dataingreso['ID_RCM'] ?>" readonly></td>
                                <td> <input type="int" name="<?php echo $SSA ?>" id="<?php echo $SSA ?>" value="<?php echo $dataingreso['SSA'] ?>" readonly></td>
                                <td> <?php echo $dataingreso['c_solicitada']; ?></td>
                                <td> <?php echo $dataingreso['cant_tot']; ?></td>
                                <td> <?php echo $dataingreso['c_surtida']; ?></td>
      
      <td>
        <select type="int" class="form-control" id="<?php echo $nombre ?>" name="<?php echo $nombre ?>" required>
                            <!-- lista desplegable desde la base de datos-->
                            <?php
                            $nombre=$nombre+1;
                            $SSA=$SSA+1;
                            $RECETA=$RECETA+1;

                            include('conec.php');
                            $VALL=$dataingreso['c_solicitada']-$dataingreso['c_surtida'];
                            if($VALL>=$dataingreso['cant_tot']){
                              $VALL=$dataingreso['cant_tot'];
                            }
                            $VALL=$VALL+1;
                            $consulta0 = "SELECT * FROM `numeros` LIMIT $VALL ";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['valor'];?>"><?php echo $row0['valor'];?></option>
              <?php }?>
                          </select></td>
      
        </tr>

<?php } ?>
  
</tbody>
                      </table>
                      <input type="hidden" name="ref" id="ref" value="<?php echo ($nombre-1) ?>">
                      
                      <button type="submit" class="btn btn-info btn-user btn-block">
                                   Entregar          
                        </button> </form>
                <!-- /.row -->
                
                </div>

</div>

            </div></div>    </div>
            <!-- /.container-fluid -->