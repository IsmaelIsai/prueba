<?php 
$user_session = session(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>EITA</title>

  <!-- Favicons -->
  <link href="../public/img/farma-header.png" rel="icon">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/fontawesome-free/css/css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

	  <!-- Sidebar - Brand -->
	  <a class="sidebar-brand d-flex align-items-center" href="<?php echo base_url("home");?>">
		<div class="sidebar-brand-icon rotate-n-15">
				</div>
			   <div class="sidebar-brand-text mx-0"><img src="img/ssf.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></div>
	  </a>

	  <!-- Divider -->
	  <hr class="sidebar-divider my-0">

	  <!-- Nav Item - Dashboard -->
	  <li class="nav-item active">
		<a class="nav-link" href="<?php echo base_url("home");?>">
		<i class="fas fa-chart-line"></i>
		  <span>Inicio</span></a>
	  </li>

	  <!-- Divider -->
	  <hr class="sidebar-divider">

			<!-- Nav Item - Pages Collapse Menu -->
	  <li class="nav-item active">
	  <a class="nav-link" href="<?php echo base_url(); ?>/catálogo">
		<i class="fas fa-folder-open"></i>
		  <span>Catálogo de productos</span>
		</a>
			  </li>

	  <!-- Nav Item - Utilities Collapse Menu -->
	  <li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
		<i class="fas fa-sign-in-alt"></i>
  		  <span>Ingreso</span>
		</a>
		<div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          	<a class="collapse-item" href="<?php echo base_url(); ?>/proveedor"><i class="fas fa-people-carry"></i> Proveedor</a>
			<a class="collapse-item" href="<?php echo base_url(); ?>/ingreso"><i class="fas fa-truck-loading"></i> Producto</a>	
          </div>
        </div>
			  </li>

			  
	  

	  <!-- Divider -->
	  <hr class="sidebar-divider d-none d-md-block">

	  <!-- Sidebar Toggler (Sidebar) -->
	  <div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	  </div>

	</ul>
	<!-- End of Sidebar -->

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

	  <!-- Main Content -->
	  <div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

		  <!-- Sidebar Toggle (Topbar) -->
		  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
			<i class="fa fa-bars"></i>
		  </button>
		  
		  <!-- Topbar Navbar -->
		  <ul class="navbar-nav ml-auto">

			<!-- Nav Item - Search Dropdown (Visible Only XS) -->
			<li class="nav-item dropdown no-arrow d-sm-none">
			  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-search fa-fw"></i>
			  </a>
			  <!-- Dropdown - Messages -->
			  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
				<form class="form-inline mr-auto w-100 navbar-search">
				  <div class="input-group">
					<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
					<div class="input-group-append">
					  <button class="btn btn-info" type="button">
						<i class="fas fa-search fa-sm"></i>
					  </button>
					</div>
				  </div>
				</form>
			  </div>
			</li>
			
			<!-- Nav Item - User Information -->
			<li class="nav-item dropdown no-arrow">
			  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user_session->nom_per; echo ' '.$user_session->ape_per;?></span>
				<i class="fas fa-sign-in-alt"></i>
			  </a>
			  <!-- Dropdown - User Information -->
			  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="#">
				  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
				  Perfil
				</a>
				<a class="dropdown-item" href="#">
				  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
				  Configuración
				</a>
							  <div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#logoutModal" data-toggle="modal" data-target="#logoutModal" data-placement="top">
				  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
				  Cerrar sesión
				</a>
			  </div>
			</li>

		  </ul>

		</nav>
		