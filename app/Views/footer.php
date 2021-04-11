
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; EITA <?php echo date('Y'); ?></span>
          </div>
        </div>
      </footer>


      <!-- End of Page Wrapper -->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>


      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <a class="btn btn-info" href="<?php echo base_url()?>/Usuarios/logout">Cerrar sesión</a>
            </div>
          </div>
        </div>
      </div>


      <!-- Agregar producto-catálogo Modal-->
      <div class="modal fade" id="agregar_productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">

              <form method="POST" action="<?php echo base_url(); ?>/Catálogo/insertar" autocomplete="off">

                <div class="form-group">
                  <div class="row">
                    <div class="col-12 col-sm-5">
                      <label class="control-label col-sm-8" for="">Clave SSA:</label>
                      <input class="form-control" id="SSA" name="SSA" type="text" placeholder="Ingresar clave" required>
                    </div>

                    <div class="col-12 col-sm-7">
                      <label class="control-label col-sm-3 offset-md-0" for="">Categoría:</label>
                      <div class="col-sm-13">
                        <select name="ID_CAT" type="text" class="form-control" id="ID_CAT" required>
                          <option value="1">Medicamento</option>
                          <option value="0">Material para curación</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12"><br>
                      <label class="control-label col-sm-12" for="">Descripción del producto:</label>
                      <input class="form-control" id="desc_produc" name="desc_produc" type="text" placeholder="Ingresar nombre genérico del producto" required>
                    </div>

                    <div class="col-12 col-sm-6"><br>
                      <label class="control-label col-sm-3" for="">Presentación:</label>
                      <input class="form-control" id="presentacion" name="presentacion" type="text" placeholder="Ingresar gramos" required>
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
      </div>

      <!-- Agregar producto-más-info-catálogo Modal-->
      <div class="modal fade" id="agregar_infoproductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo base_url(); ?>/Ingreso/insertar" autocomplete="off">
                <div class="form-group">
                  <div class="row">
                    <div class="col-12 col-sm-12">
                      <label class="control-label col-sm-8">Producto:</label>
                      <div class="col-sm-18">
                        <select name="SSA" type="text" class="form-control" id="SSA" required>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" required>Seleccionar</option>
                            <!-- lista desplegable desde la base de datos-->
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos`";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"required><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                      </div>
                    </div>

                    <div class="col-12 col-sm-3"><br>
                      <label class="control-label col-sm-8" for="">Cantidad:</label>
                      <input name="cantidad" type="number" class="form-control" id="cantidad" placeholder="Insertar cantidad" required>
                    </div>

                    <div class="col-12 col-sm-3"><br>
                      <label class="control-label col-sm-4" for="">Lote:</label>
                      <input name="lote" type="text" class="form-control" id="lote" placeholder="Insertar lote" required>
                    </div>

                    <div class="col-12 col-sm-6"><br>
                      <label class="control-label col-sm-22 offset-md-1" for="">Fecha de caducidad:</label>
                      <input name="f_expira" type="date" class="form-control" id="f_expira" required>
                    </div>

                    <div class="col-15 col-sm-6"><br>
                      <label class="control-label col-sm-23 offset-md-1" for="">Fecha de recepción:</label>
                      <input name="f_entrada"type="date" class="form-control" id="f_entrada" required>
                    </div>

                    <div class="col-12 col-sm-6"><br>
                      <label class="control-label col-sm-15 offset-md-1" for="">Folio de recepción:</label>
                      <input type="text" name="folio_ing" class="form-control" id="folio_ing" placeholder="Insertar folio" required>
                    </div>

                    <div class="col-12 col-sm-7"><br>
                      <label class="control-label col-sm-6" for="">Proveedor:</label>
                      <div class="col-sm-16">
                        <select name="ID_PROV" type="text" class="form-control" id="ID_PROV" required>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccione</option>
                          <?php
                            include('conec.php');
                            $consulta1 = "SELECT * FROM `t_provedor`";
                            $resultado1 = $conexion->query($consulta1);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row1= $resultado1-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row1['ID_PROV'];?>"><?php echo $row1['empresa_prov'];?></option>
              <?php }?>

                        </select>
                      </div>
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

      <!-- Agregar proveedor-->
      <div class="modal fade" id="agregar_provModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo proveedor</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo base_url(); ?>/Proveedor/insertar" autocomplete="off">
                <div class="form-group">
                  <div class="row">

                  <div class="col-12 col-sm-6">
                      <label class="control-label col-sm-10" for="">Nombre:</label>
                      <input type="text" name="nom_prov" class="form-control" id="nom_prov" placeholder="Insertar nombre(s)" required>
                    </div>

                    <div class="col-12 col-sm-6">
                      <label class="control-label col-sm-8" for="">Apellidos:</label>
                      <input type="text" name="ape_prov" class="form-control" id="ape_prov" placeholder="Insertar apellidos" required>
                    </div>

                    <div class="col-12 col-sm-4"><br>
                      <label class="control-label col-sm-10" for="">Edad:</label>
                      <input type="number" class="form-control" name="edad_prov" id="edad_prov" placeholder="Insertar edad" required>
                    </div>

                    <div class="col-12 col-sm-8"><br>
                      <label class="control-label col-sm-10" for="">Teléfono celular:</label>
                      <input type="number" class="form-control" name="tel_provedor" id="tel_provedor" placeholder="Insertar teléfono celular" required>
                    </div>

                    <div class="col-12 col-sm-6"><br>
                      <label class="control-label col-sm-22 offset-md-1" for="">Empresa:</label>
                      <input type="text" class="form-control" name="empresa_prov" id="empresa_prov" placeholder="Insertar nombre de empresa" required>
                    </div>

                    <div class="col-15 col-sm-6"><br>
                      <label class="control-label col-sm-23 offset-md-1" for="">Correo electrónico:</label>
                      <input type="email" class="form-control" name="correo_prov" id="correo_prov" placeholder="Insertar correo electrónico" required>
                    </div>

                  <div class="col-12 col-sm-8">
                      <label class="control-label col-sm-10" for="">Código de proveedor:</label>
                      <input type="text" name="ID_PROV" class="form-control" id="ID_PROV" placeholder="Insertar código de proveedor" required>
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

      <!-- Agregar usuario-->
      <div class="modal fade" id="agregar_usuModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo base_url();?>/Usuarios/insertar" autocomplete="off">
                <div class="form-group">
                  <div class="row">

                  <div class="col-12 col-sm-6">
                      <label class="control-label col-sm-8" for="">CURP:</label>
                      <input type="text" class="form-control" id="CURP" name="CURP" placeholder="Insertar CURP"  required>
                    </div>

                    <div class="col-12 col-sm-6">
                      <label class="control-label col-sm-8" for="">Nombre:</label>
                      <input type="text" class="form-control" id="nom_per" name="nom_per" placeholder="Insertar nombre(s)"  required>
                    </div>

                    <div class="col-12 col-sm-5"><br>
                      <label class="control-label col-sm-8" for="">Apellido:</label>
                      <input type="text" class="form-control" id="ape_per" name="ape_per" placeholder="Insertar apellidos"  required>
                    </div>

                    <div class="col-12 col-sm-3"><br>
                      <label class="control-label col-sm-4" for="">Edad:</label>
                      <input type="number" class="form-control" id="edad_per" name="edad_per" placeholder="Insertar edad"  required>
                    </div>

                    <div class="col-12 col-sm-4"><br>
                      <label class="control-label col-sm-14" for="">Cédula Prof:</label>
                      <input type="text" class="form-control" id="cedu_per" name="cedu_per" placeholder="Insertar C.P."  required>
                    </div>
                    
                    <div class="col-15 col-sm-6"><br>
                      <label class="control-label col-sm-23 offset-md-1" for="">Correo electrónico:</label>
                      <input type="email" class="form-control" name="correo_per" id="correo_per" placeholder="Insertar correo electrónico"  required>
                    </div>

                    <div class="col-12 col-sm-6"><br>
                      <label class="control-label col-sm-22 offset-md-1" for="">Roll:</label>
                      <div class="col-sm-18">
                        <select type="text" class="form-control" name="ID_C" id="ID_C"  equired>
                          <?php
                            include('conec.php');
                            $consulta2 = "SELECT * FROM `t_cargo`";
                            $resultado2 = $conexion->query($consulta2);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row2= $resultado2-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row2['ID_C'];?>"><?php echo $row2['roll'];?></option>
              <?php }?>
                        
                        </select>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12"><br>
                      <label class="control-label col-sm-22 offset-md-1" for="">Contraseña:</label>
                      <input type="password" class="form-control" name="contra_per" id="contra_per" placeholder="Insertar contraseña" required>
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

      <!-- Agregar salida de receta médica-->
      <div class="modal fade" id="agregar_srmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva salida por receta médica</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo base_url(); ?>" autocomplete="off">
                <div class="form-group">
                  <div class="row">

                  <div class="col-12 col-sm-6">
                      <label class="control-label col-sm-22 offset-md-1" for="">Nombre del paciente:</label>
                      <input type="text" class="form-control" id="nom_pac" name="nom_pac" placeholder="Insertar cantidad" required>
                    </div>

                    <div class="col-12 col-sm-6">
                      <label class="control-label col-sm-22 offset-md-1" for="">Servicio:</label>
                      <input type="text" class="form-control" id="servicio" name="servicio" placeholder="Insertar lote" required>
                    </div>

                    <div class="col-12 col-sm-6"><br>
                      <label class="control-label col-sm-22 offset-md-1" for="">Población atendida:</label>
                      <input type="text" class="form-control" id="pob_aten" name="pob_aten" placeholder="Insertar lote" required>
                    </div>

                    <div class="col-15 col-sm-6"><br>
                      <label class="control-label col-sm-23 offset-md-1" for="">Número de expediente:</label>
                      <input type="email" class="form-control" id="num_exp" name="num_exp" placeholder="Insertar lote" required>
                    </div>
                    
                    <div class="col-12 col-sm-3">
                      <label class="control-label col-sm-22 offset-md-1"  for="">Edad:</label>
                      <input type="number" class="form-control" id="edad_pac" name="edad_pac" placeholder="Insertar cantidad" required>
                    </div>

                    <div class="col-12 col-sm-3">
                      <label class="control-label col-sm-22 offset-md-1"  for="">Sexo:</label>
                      <input type="text" class="form-control" id="sexo_pac" name="sexo_pac" placeholder="Insertar cantidad" required>
                    </div>

                    <div class="col-12 col-sm-12">
                      <label class="control-label col-sm-22 offset-md-1"  for="">Diagnóstico:</label>
                      <input type="text" class="form-control" id="diag_pac" name="diag_pac" placeholder="Insertar lote" required>
                    </div>

                    <div class="col-12 col-sm-12">
                      <label class="control-label col-sm-8">Producto:</label>
                      <div class="col-sm-18">
                        <select name="SSA" type="text" class="form-control" id="SSA" name="SSA" required>
                          <option selected="true" disabled="disabled" class="control-label col-sm-3" value="0" required>Seleccionar</option>
                            <!-- lista desplegable desde la base de datos-->
                            <?php
                            include('conec.php');
                            $consulta0 = "SELECT * FROM `t_productos`";
                            $resultado0 = $conexion->query($consulta0);
                            //Ejecutar la consulta
                            ?>
                            <?php WHILE($row0= $resultado0-> fetch_assoc()){?>
              <option class="label"  value="<?php echo $row0['SSA'];?>"><?php echo $row0['desc_produc'];?></option>
              <?php }?>
                          </select>
                      </div>
                    </div>

                    <div class="col-12 col-sm-6"><br>
                      <label class="control-label col-sm-22 offset-md-1" for="">Cantidad:</label>
                      <input type="number" class="form-control" id="c_solicitada" name="c_solicitada" placeholder="Cantidad" required>
                    </div>

                    <div class="col-15 col-sm-"><br>
                      <label class="control-label col-sm-22 offset-md-1" for="">Indicaciones médicas:</label>
                      <input type="email" class="form-control" id="indicaciones" name="indicaciones" placeholder="Indicaciones" required>
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

      <!-- Agregar salida de material de curación-->
      <div class="modal fade" id="agregar_smcModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva salida de material de curación</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo base_url(); ?>" autocomplete="off">
                <div class="form-group">
                  <div class="row">

                  <div class="col-12 col-sm-3">
                      <label class="control-label col-sm-8" for="">Nombre:</label>
                      <input type="text" class="form-control" id="cantidad" placeholder="Insertar cantidad" required>
                    </div>

                    <div class="col-12 col-sm-3">
                      <label class="control-label col-sm-8" for="">Apellido:</label>
                      <input type="text" class="form-control" id="cantidad" placeholder="Insertar cantidad" required>
                    </div>

                    <div class="col-12 col-sm-3">
                      <label class="control-label col-sm-4" for="">Teléfono:</label>
                      <input type="number" class="form-control" id="lote" placeholder="Insertar lote" required>
                    </div>

                    <div class="col-12 col-sm-6"><br>
                      <label class="control-label col-sm-22 offset-md-1" for="">Empresa:</label>
                      <input type="text" class="form-control" id="F_expira" placeholder="Insertar lote" required>
                    </div>

                    <div class="col-15 col-sm-6"><br>
                      <label class="control-label col-sm-23 offset-md-1" for="">Correo electrónico:</label>
                      <input type="email" class="form-control" id="f_entrada" placeholder="Insertar lote" required>
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

      <!-- Agregar salida de medicamentos-->
      <div class="modal fade" id="agregar_smModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva salida de medicamentos</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo base_url(); ?>" autocomplete="off">
                <div class="form-group">
                  <div class="row">

                  <div class="col-12 col-sm-3">
                      <label class="control-label col-sm-8" for="">Nombre:</label>
                      <input type="text" class="form-control" id="cantidad" placeholder="Insertar cantidad" required>
                    </div>

                    <div class="col-12 col-sm-3">
                      <label class="control-label col-sm-8" for="">Apellido:</label>
                      <input type="text" class="form-control" id="cantidad" placeholder="Insertar cantidad" required>
                    </div>

                    <div class="col-12 col-sm-3">
                      <label class="control-label col-sm-4" for="">Teléfono:</label>
                      <input type="number" class="form-control" id="lote" placeholder="Insertar lote" required>
                    </div>

                    <div class="col-12 col-sm-6"><br>
                      <label class="control-label col-sm-22 offset-md-1" for="">Empresa:</label>
                      <input type="text" class="form-control" id="F_expira" placeholder="Insertar lote" required>
                    </div>

                    <div class="col-15 col-sm-6"><br>
                      <label class="control-label col-sm-23 offset-md-1" for="">Correo electrónico:</label>
                      <input type="email" class="form-control" id="f_entrada" placeholder="Insertar lote" required>
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

     <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="<?php echo base_url() ?>/js/sb-admin-2.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Page level plugins -->
      <script src="vendor/chart.js/Chart.min.js"></script>

      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="<?php echo base_url() ?>/js/demo/datatables-demo.js"></script>

      <!-- Page level custom scripts -->
      <script src="<?php echo base_url() ?>/js/demo/chart-area-demo.js"></script>
      <script src="<?php echo base_url() ?>/js/demo/chart-pie-demo.js"></script>
      <script src="<?php echo base_url() ?>/js/demo/chart-bar-demo.js"></script>

      </body>

      </html>
