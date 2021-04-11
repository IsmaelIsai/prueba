     <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pacientes de la unidad</h1>
          </div>
          <!-- Content Row -->
          
          <div class="row">
              <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-success">Folios</h5><br><br>

<form method="post" action="<?php echo base_url(); ?>/S_receta" class="d-none d-sm-inline-block form-inline mr-auto m1-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <label class="control-label col-sm-3 offset-md-0" for="">Receta: </label>
              <input type="text" class="form-control bg-white border-4" id="a" name="a" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form><br><br>
  <form method="post" action="<?php echo base_url(); ?>/S_medicamento" class="d-none d-sm-inline-block form-inline mr-auto m1-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <label class="control-label col-sm-3 offset-md-0" for="">Colectivo de medicamentos: </label>
              <input type="text" class="form-control bg-white border-4" id="a" name="a" placeholder="Buscar por..." aria-label="Search" required minlength="6">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form><br><br>

    <form method="post" action="<?php echo base_url(); ?>/S_curacion" class="d-none d-sm-inline-block form-inline mr-auto m1-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <label class="control-label col-sm-3 offset-md-0" for="">Colectivo de material de curación: </label>
              <input type="text" value=""class="form-control bg-white border-4" id="a" name="a" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form><br><br>




  </div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>