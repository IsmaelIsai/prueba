        <div class="container-fluid">

              <!-- Page Heading -->
              <div class="row">
              <div class="col-md-12 ">
              <div class="card shadow mb-6">

                <div class="card-header py-3">
                <h5 class="m-1 font-weight-bold text-info float-left">Salida de receta médica</h5>

                                  </div>
        
           <form action="<?php echo base_url(); ?>/Receta_med/insertar" name="despachar" autocomplete="off" method="POST">
                <div class="card-body">
                  <div class="row"> 
                  <div class="col-md-6 mb-12">
                                <label for=""></BR>Nombre(s) de paciente:</label>
                                <input type="text" class="form-control" id="nom_pac" name="nom_pac" placeholder="Introducir nombre(s) de paciente" required >
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for=""></BR>Servicio:</label>
                                <div class="col-sm-18">
                        <select type="text" class="form-control" id="ID_SER" name="ID_SER" required>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                          <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_servicio`";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option  class="label"  value="<?php echo $row0['ID_SER'];?>"><?php echo $row0['nom_ser'];?></option>
              <?php }?>
                          </select>
                      </div>
                            </div>
                            

                            <div class="col-md-2 mb-3">
                                <label for="">Población atendida:</label>
        <input type="text" class="form-control" id="pob_aten" name="pob_aten" placeholder="Introducir " required >
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="">Num. de expediente:</label>
        <input type="number" class="form-control" id="num_exp" name="num_exp" placeholder="Introducir " required >
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="">Edad:</label>
                                <input type="number" class="form-control" id="edad_pac" name="edad_pac" placeholder="Introducir" required >
          </div>

                            <div class="col-md-2 mb-3">
                                <label for="">Sexo:</label>
                                <div class="col-sm-18">
                        <select name="sexo_pac" type="text" class="form-control" id="sexo_pac" required>
                          <option value="Masculino">Masculino</option>
                          <option value="Femenino">Femenino</option>
                        </select>
                      </div>
                            </div>

                            <div class="col-md-4 mb-12">
                                <label for="">CURP:</label>
        <input type="text" class="form-control" id="CURP_P" name="CURP_P" placeholder="Introducir " required >
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="">Folio:</label>
        <input type="text" class="form-control" id="FOLIO_R" name="FOLIO_R" placeholder="Introducir " required >
                            </div>
                          </div>
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
                          </div>
                          <div class="row"> 
                            <div class="col-md-4 mb-3">
                                <label for=""></br>Clave SSA del medicamento:</label>
        <select type="text" class="form-control" id="SSA" name="SSA" required>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            <!-- lista desplegable desde la base de datos-->
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='1'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option onclick="getProduct('<?php echo $row0['SSA']; ?>')" class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['SSA'];?></option>
              <?php }?>
                          </select>
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for=""></br>Descripción:</label>
        <input type="text" class="form-control" id="desc_produc" name="desc_produc"  required disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for=""></br>Presentación:</label>
        <input type="text" class="form-control" id="presentacion" name="presentacion"  required disabled>
                            </div>

                            <div class="form-group">
                            <label></br>Lote</label>
                            <select class="form-control" id="lote" name="lote" required>
                              <option value="0">Sin resultado</option>

                            </select>
                        </div>

                            <div class="col-md-2 mb-3">
                                <label for=""></BR>Caducidad:</label>
                                <input type="text" class="form-control" id="f_expira" name="f_expira" required disabled>
          </div>

                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad</BR>solicitada:</label>
        <input type="number" class="form-control" name="c_solicitada" id="c_solicitada" placeholder="Introducire" required >
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad</BR>surtida:</label>
        <input type="number" class="form-control" name="c_surtida" id="c_surtida" placeholder="Introducire" required >
                            </div>
                            <!-- SEGUNDO MEDICAMENTO-->
                            <!-- SEGUNDO MEDICAMENTO-->
                            <!-- SEGUNDO MEDICAMENTO-->
                            <div class="col-md-4 mb-3">
                                <label for=""></br>Clave SSA del medicamento:</label>
        <select type="text" class="form-control" id="SSA2" name="SSA2" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required >Seleccionar</option>
                            <!-- lista desplegable desde la base de datos-->
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='1'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option onclick="getProduct('<?php echo $row0['SSA']; ?>')" class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['SSA'];?></option>
              <?php }?>
                          </select>
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for=""></br>Descripción:</label>
        <input type="text" class="form-control" id="desc_produc2" name="desc_produc2"  required disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for=""></br>Presentación:</label>
        <input type="text" class="form-control" id="presentacion2" name="presentacion2"  required disabled>
                            </div>

                            <div class="form-group">
                            <label></br>Lote</label>
                            <select class="form-control" id="lote2" name="lote2" required disabled>
                              <option value="0">Sin resultado</option>

                            </select>
                        </div>

                            <div class="col-md-2 mb-3">
                                <label for=""></BR>Caducidad:</label>
                                <input type="text" class="form-control" id="f_expira2" name="f_expira2" required disabled>
                              </div>

                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad</BR>solicitada:</label>
        <input type="number" class="form-control" name="c_solicitada2" id="c_solicitada2" placeholder="Introducire" required disabled>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad</BR>surtida:</label>
        <input type="number" class="form-control" name="c_surtida2" id="c_surtida2" placeholder="Introducire" required disabled>
                            </div>
                            <div>
                              <label for=""></br></br></br></label>
                            <input name="checkbox1" id="checkbox1" type="checkbox"  onclick="document.despachar.SSA2.disabled=!document.despachar.SSA2.disabled, document.despachar.lote2.disabled=!document.despachar.lote2.disabled, document.despachar.c_solicitada2.disabled=!document.despachar.c_solicitada2.disabled, document.despachar.c_surtida2.disabled=!document.despachar.c_surtida2.disabled"><br/>
                          </div>
                            <!-- TERCER    MEDICAMENTO-->
                            <!-- TERCER    MEDICAMENTO-->
                            <!-- TERCER    MEDICAMENTO-->
                            <div class="col-md-4 mb-3">
                                <label for=""></br>Clave SSA del medicamento:</label>
        <select type="text" class="form-control" id="SSA3" name="SSA3" required disabled>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required >Seleccionar</option>
                            <!-- lista desplegable desde la base de datos-->
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos` WHERE ID_CAT='1'";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option onclick="getProduct('<?php echo $row0['SSA']; ?>')" class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['SSA'];?></option>
              <?php }?>
                          </select>
                            </div>

                          <div class="col-md-7 mb-3">
                                <label for=""></br>Descripción:</label>
        <input type="text" class="form-control" id="desc_produc3" name="desc_produc3"  required disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for=""></br>Presentación:</label>
        <input type="text" class="form-control" id="presentacion3" name="presentacion3"  required disabled>
                            </div>

                            <div class="form-group">
                            <label></br>Lote</label>
                            <select class="form-control" id="lote3" name="lote3" required disabled>>
                              <option value="0">Sin resultado</option>

                            </select>
                        </div>

                            <div class="col-md-2 mb-3">
                                <label for=""></BR>Caducidad:</label>
                                <input type="text" class="form-control" id="f_expira3" name="f_expira3" required disabled>
          </div>

                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad</BR>solicitada:</label>
        <input type="number" class="form-control" name="c_solicitada3" id="c_solicitada3" placeholder="Introducire" required disabled>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="">Cantidad</BR>surtida:</label>
        <input type="number" class="form-control" name="c_surtida3" id="c_surtida3" placeholder="Introducire" required disabled>
                            </div>
                            <div>
                              <label for=""></br></br></br></label>
                            <input name="checkbox2" id="checkbox2" type="checkbox"  onclick="document.despachar.SSA3.disabled=!document.despachar.SSA3.disabled, document.despachar.lote3.disabled=!document.despachar.lote3.disabled, document.despachar.c_solicitada3.disabled=!document.despachar.c_solicitada3.disabled, document.despachar.c_surtida3.disabled=!document.despachar.c_surtida3.disabled"><br/>
                          </div>

                            

                        <button type="submit" class="btn btn-info btn-user btn-block">
                                   Solicitar          
                        </button>     
                        </div>
                        </form>  
                  </div>
                

</div>

            </div></div>    </div>
            <!-- /.container-fluid -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/js/jquery-3.3.1.js"></script>
   <script type="text/javascript">
    $(document).ready(function(){
      $('#SSA').change(function(){

                var id=$(this).val();
                var html = '';
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Receta_med/searchById/' + id,
                  cache: false,

                  success: function(response){
                    var html = '';
                    if(response==null){
                        html += `<option value="0">Sin lotes dispobibles</option>`;
                    }else{
                    var i;
                    if(response.length==0){
                        html += `<option value="0">Sin lotes dispobibles</option>`;
                      }
                      html += `<option value="0">Seleccione el lote</option>`;
                    for(i=0; i<response.length; i++){
                        html += `<option value=`+response[i].Lote+`>`+response[i].Lote+`</option>`;
                      }}
                      
                    $('#lote').html(html);
                    }
                });
                return false;
            }); 
            
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#lote').change(function(){

                var id=$(this).val();
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Receta_med/searchById2/' + id,
                  cache: false,
                  success: function(response){
                    $("#f_expira").val(response.f_expira);
               
                    }
                });
                return false;
            }); 
            
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#SSA2').change(function(){

                var id=$(this).val();
                var html = '';
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Receta_med/searchById/' + id,
                  cache: false,

                  success: function(response){
                    var html = '';
                    if(response==null){
                        html += `<option value="0">Sin lotes dispobibles</option>`;
                    }else{
                    var i;
                    if(response.length==0){
                        html += `<option value="0">Sin lotes dispobibles</option>`;
                      }
                      html += `<option value="0">Seleccione el lote</option>`;
                    for(i=0; i<response.length; i++){
                        html += `<option value=`+response[i].Lote+`>`+response[i].Lote+`</option>`;
                      }}
                      
                    $('#lote2').html(html);
                    }
                });
                return false;
            }); 
            
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#lote2').change(function(){

                var id=$(this).val();
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Receta_med/searchById2/' + id,
                  cache: false,
                  success: function(response){
                    $("#f_expira2").val(response.f_expira);
               
                    }
                });
                return false;
            }); 
            
    });
  </script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#SSA3').change(function(){

                var id=$(this).val();
                var html = '';
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Receta_med/searchById/' + id,
                  cache: false,

                  success: function(response){
                    var html = '';
                    if(response==null){
                        html += `<option value="0">Sin lotes dispobibles</option>`;
                    }else{
                    var i;
                    if(response.length==0){
                        html += `<option value="0">Sin lotes dispobibles</option>`;
                      }
                      html += `<option value="0">Seleccione el lote</option>`;
                    for(i=0; i<response.length; i++){
                        html += `<option value=`+response[i].Lote+`>`+response[i].Lote+`</option>`;
                      }}
                      
                    $('#lote3').html(html);
                    }
                });
                return false;
            }); 
            
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#lote3').change(function(){

                var id=$(this).val();
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Receta_med/searchById2/' + id,
                  cache: false,
                  success: function(response){
                    $("#f_expira3").val(response.f_expira);
               
                    }
                });
                return false;
            }); 
            
    });
  </script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#SSA').change(function(){

                var id=$(this).val();
                var html = '';
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Receta_med/searchById3/' + id,
                  cache: false,

                  success: function(response){
                    $("#desc_produc").val(response.desc_produc);
                    $("#presentacion").val(response.presentacion);
                    }
                });
                return false;
            }); 
            
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#SSA2').change(function(){

                var id=$(this).val();
                var html = '';
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Receta_med/searchById3/' + id,
                  cache: false,

                  success: function(response){
                    $("#desc_produc2").val(response.desc_produc);
                    $("#presentacion2").val(response.presentacion);
                    }
                });
                return false;
            }); 
            
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#SSA3').change(function(){

                var id=$(this).val();
                var html = '';
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: '<?php echo base_url(); ?>/Receta_med/searchById3/' + id,
                  cache: false,

                  success: function(response){
                    $("#desc_produc3").val(response.desc_produc);
                    $("#presentacion3").val(response.presentacion);
                    }
                });
                return false;
            }); 
            
    });
  </script>