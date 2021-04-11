        <div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-md-12 ">
<div class="card shadow mb-6">
                <div class="card-header py-3">
                <h5 class="m-1 font-weight-bold text-info float-left">Salida de materiales de curación</h5>
                <div>
                </div>
                  </div>
                  <form action="<?php echo base_url(); ?>/Curacion/insertar" name="despachar" autocomplete="off" method="POST">
                <div class="card-body"> 
                            <div class="row"> 
                            
                            <div class="col-md-2 mb-3">
                                <label for="">Turno:</label>
                                <div class="col-sm-18">
                        <select type="text" class="form-control" name="turno" id="turno" required>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                          <option value="Matutino">Matutino</option>
                          <option value="Vespertino">Vespertino</option>
                          <option value="Nocturno A">Nocturno A</option> 
                          <option value="Nocturno B">Nocturno B</option>
                          <option value="Especial A">Especial A</option>
                          <option value="Especial B">Especial B</option>                             
                          </select>
                      </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Servicio:</label>
                                <div class="col-sm-18">
                        <select type="text" class="form-control" id="servicio" name="servicio" required>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                          <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_servicio`";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['nom_ser'];?>"><?php echo $row0['nom_ser'];?></option>
              <?php }?>
                          </select>
                      </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="">
                                <label for=""></br>1</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select name="SSA" type="text" class="form-control" id="SSA" name="SSA" required>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            <!-- lista desplegable desde la base de datos-->
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada" name="c_solicitada" placeholder="Introducir" required >
          </div>
</div><div class="row"> 
                            <div class="">
                                <label for=""></br>2</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA2" name="SSA2" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
 
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada2" name="c_solicitada2" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox1" id="checkbox1" type="checkbox"  onclick="document.despachar.SSA2.disabled=!document.despachar.SSA2.disabled, document.despachar.c_solicitada2.disabled=!document.despachar.c_solicitada2.disabled"></div>
</div><div class="row"> 
                            <div class="">
                                <label for=""></br>3</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA3" name="SSA3" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada3" name="c_solicitada3" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox2" id="checkbox2" type="checkbox" onclick="document.despachar.SSA3.disabled=!document.despachar.SSA3.disabled, document.despachar.c_solicitada3.disabled=!document.despachar.c_solicitada3.disabled"></div>
                            </div><div class="row"> 
                            <div class="">
                                <label for=""></br>4</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA4" name="SSA4" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
 
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada4" name="c_solicitada4" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox3" id="checkbox3" type="checkbox"  onclick="document.despachar.SSA4.disabled=!document.despachar.SSA4.disabled, document.despachar.c_solicitada4.disabled=!document.despachar.c_solicitada4.disabled"></div>

                            </div><div class="row"> 
                            <div class="">
                                <label for=""></br>5</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA5" name="SSA5" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada5" name="c_solicitada5" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox4" id="checkbox4" type="checkbox" onclick="document.despachar.SSA5.disabled=!document.despachar.SSA5.disabled, document.despachar.c_solicitada5.disabled=!document.despachar.c_solicitada5.disabled"></div>
                            </div><div class="row"> 
                            <div class="">
                                <label for=""></br>6</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA6" name="SSA6" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
 
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada6" name="c_solicitada6" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox5" id="checkbox5" type="checkbox"  onclick="document.despachar.SSA6.disabled=!document.despachar.SSA6.disabled, document.despachar.c_solicitada6.disabled=!document.despachar.c_solicitada6.disabled"></div>
                            </div><div class="row"> 
                            <div class="">
                                <label for=""></br>7</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA7" name="SSA7" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada7" name="c_solicitada7" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox6" id="checkbox6" type="checkbox" onclick="document.despachar.SSA7.disabled=!document.despachar.SSA7.disabled, document.despachar.c_solicitada7.disabled=!document.despachar.c_solicitada7.disabled"></div>
                            </div><div class="row"> 
                            <div class="">
                                <label for=""></br>8</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA8" name="SSA8" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
 
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada8" name="c_solicitada8" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox7" id="checkbox7" type="checkbox"  onclick="document.despachar.SSA8.disabled=!document.despachar.SSA8.disabled, document.despachar.c_solicitada8.disabled=!document.despachar.c_solicitada8.disabled"></div>
                            </div><div class="row"> 
                            <div class="">
                                <label for=""></br>9</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA9" name="SSA9" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada9" name="c_solicitada9" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox8" id="checkbox8" type="checkbox" onclick="document.despachar.SSA9.disabled=!document.despachar.SSA9.disabled, document.despachar.c_solicitada9.disabled=!document.despachar.c_solicitada9.disabled"></div>
                                                                                                                                 
                        </div>
                        <div class="row"> 
                            <div class="">
                                <label for=""></br>10</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA10" name="SSA10" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada10" name="c_solicitada10" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox9" id="checkbox9" type="checkbox" onclick="document.despachar.SSA10.disabled=!document.despachar.SSA10.disabled, document.despachar.c_solicitada10.disabled=!document.despachar.c_solicitada10.disabled"></div>
                                                                                                                                 
                        </div>
                        <div class="row"> 
                            <div class="">
                                <label for=""></br>11</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA11" name="SSA11" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada11" name="c_solicitada11" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox10" id="checkbox10" type="checkbox" onclick="document.despachar.SSA11.disabled=!document.despachar.SSA11.disabled, document.despachar.c_solicitada11.disabled=!document.despachar.c_solicitada11.disabled"></div>
                                                                                                                                 
                        </div>
                        <div class="row"> 
                            <div class="">
                                <label for=""></br>12</label>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Clave y nombre genérico del medicamento:</label>
        <select type="text" class="form-control" id="SSA12" name="SSA12" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='0'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad:</label>
                                <input type="number" class="form-control" id="c_solicitada12" name="c_solicitada12" placeholder="Introducir" disabled>
          </div>

                            <div class="">
                            <label for=""></br></br></label>
                            <input name="checkbox11" id="checkbox11" type="checkbox" onclick="document.despachar.SSA12.disabled=!document.despachar.SSA12.disabled, document.despachar.c_solicitada12.disabled=!document.despachar.c_solicitada12.disabled"></div>
                                                                                                                                 
                        </div>

                        <button type="submit" class="btn btn-info btn-user btn-block">
                                   Solicitar          
                        </button> 
                  </div>
                </form>
                <!-- /.row -->
                
                </div>

</div>

            </div></div>    </div>
            <!-- /.container-fluid -->

