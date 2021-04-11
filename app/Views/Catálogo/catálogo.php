				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">

						<div class="col-md-12 ">

							<div class="card shadow mb-3 float-right ">
								<div class="card-header py-3">
									<h5 class="m-1 font-weight-bold text-info float-left"> <?php echo $titulo; ?> </h5>

									<button href="#" class="btn btn-info btn-icon-split float-right" data-toggle="modal" data-target="#agregar_productModal" data-placement="top">
										<span class="icon text-white-1" aria-hidden="true"><i class="fas fa-folder-plus"></i></span><span class="text">Agregar producto</span>
									</button>
								</div>


								<div class="card-body ">
									<!-- /.row -->

									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>
														<center>Clave SSA</center>
													</th>
													<th>
														<center>Descripción del producto</center>
													</th>
													<th>
														<center>Presentación</center>
													</th>
													<th>
														<center>Categoría</center>
													</th>
													<th>
														<center>Cantidad</center>
													</th>
													<th>
														<center>Acción</center>
													</th>

												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>
														<center>Clave SSA</center>
													</th>
													<th>
														<center>Descripción del producto</center>
													</th>
													<th>
														<center>Presentación</center>
													</th>
													<th>
														<center>Categoría</center>
													</th>
													<th>
														<center>Cantidad</center>
													</th>
													<th>
														<center>Acción</center>
													</th>

												</tr>
											</tfoot>

											<tbody>

												<?php foreach ($datos as $dato) { ?>

													<tr>
														<td>
															<center><?php echo $dato['SSA']; ?></center>
														</td>
														<td>
															<center><?php echo $dato['desc_produc']; ?></center>
														</td>
														<td>
															<center><?php echo $dato['presentacion']; ?></center>
														</td>
														<td>
															<center><?php echo $dato['ID_CAT']; ?></center>
														</td>
														<td>
															<center><?php echo $dato['cant_tot']; ?></center>
														</td>

														<td>
															<center>
																<a onclick="getProduct('<?php echo $dato['SSA']; ?>')" class="btn btn-warning btn-icon-split float-right btn-sm" id="openEditModal">
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
									</div>
								</div>
							</div>


						</div>
						<!-- /.container-fluid -->

					</div>
					<!-- End of Main Content -->


					<!-- Editar producto de catálogo-->
					<div class="modal fade" id="editar_productModal" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="editar_productModalLabel">Editar producto</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<form method="POST" action="<?php echo base_url(); ?>/Catálogo/actualizar">
										<div class="form-group">
											<div class="row">
												<div class="col-12 col-sm-12">
													<label class="control-label col-lg-12" for="">SSA:</label>
													<input class="form-control form-group-lg" id="SSA" name="SSA" type="text" value="" readonly/>
												</div>
												<div class="col-12 col-sm-12">
													<label class="control-label col-lg-12" for="">Descripción del producto:</label>
													<input class="form-control form-group-lg" id="desc_produc" name="desc_produc" type="text" value="" />
												</div>

												<div class="col-12 col-sm-6"><br>
													<label class="control-label col-sm-3" for="">Presentación:</label>
													<input class="form-control" id="presentacion" name="presentacion" type="text" value="" />
												</div>

												<div class="col-12 col-sm-6"><br>
													<label class="control-label col-sm-3 offset-md-0" for="">Categoría:</label>
													<div class="col-sm-13">
														<select name="ID_CAT" id="ID_CAT" type="text" class="form-control" value="">
															<option value="1">Medicamentos</option>
															<option value="0">Material para curación</option>
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

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
					<script>
						// openEditModal
						function getProduct(ssa) {
								$.ajax({
									type: "POST",
									dataType: 'json',
									url: '<?php echo base_url(); ?>/Catálogo/searchById/' + ssa,
									cache: false,
									success: function(response) {
										$("#SSA").val(response.SSA);
										$("#desc_produc").val(response.desc_produc);
										$("#presentacion").val(response.presentacion);
										$("#ID_CAT").val(response.ID_CAT);
										$("#editar_productModal").modal("show");

									}
								});

								return false;
							}

					</script>