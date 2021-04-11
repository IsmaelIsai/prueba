<?php 
$user_session = session(); 
if($user_session != null){
echo $user_session->nom_per;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EITA</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/fontawesome-free/css/css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">
    <br><br><br><br>

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-3">
        <!-- Nested Row within Card Body -->
        <div class="row">
<div class="col-lg-7 d-none d-lg-block"><img src="img/inventario-farma.jpg"></div>
              <div class="col-lg-5">
                <div class="p-4">
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-5">Iniciar sesión</h1>
                  </div>
<fieldset>
  
  <form method="POST" action="<?php echo base_url(); ?>/Usuarios/valida" class="user">
  <div class="form-group">
      <input type="text" class="form-control form-control-user"  id="CURP" name="CURP" placeholder="CURP" required>
    </div>
    <div class="form-group">
      <input type="password"  class="form-control form-control-user" id="contra_per" name="contra_per" placeholder="Contraseña" required>
    </div>
    <div class="text-center">
    <button type="submit" class="btn btn-info btn-user btn-block">Ingresar</button></div>
                          
    <?php if (isset($validation)) { ?>

<div class="alert alert-danger" >
 <?php echo $validation->listErrors(); ?>

</div>
<?php  } ?>

<?php if (isset($error)) { ?>

<div class="alert alert-danger" >
 <?php echo $error; ?>

</div>
<?php  } ?>

  </form>
</fieldset>
<hr>        <div class="text-center">
            <a class="small" href="<?php echo base_url("inicio");?>">Inicio</a>
            </div>
  </div> <!-- end login-form -->
</div></div></div></div>
 <!-- Footer -->
 <footer class="sticky-footer bg-blue">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; EITA  <?php echo date('Y'); ?></span>
          </div>
        </div>
      </footer>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>/js/sb-admin-2.min.js"></script>

  </body>
</html>


 