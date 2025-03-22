<!DOCTYPE html>
<html lang="pt-br">
	<!-- Head -->
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:title" content="CRUD-PW2-2024" />
		<meta property="og:url" content="http://projetopw2024.great-site.net/" />
		<meta property="og:image" content="<?php echo BASEURL; ?>/img/icone.ico" />
		<link rel="icon" type="image/x-icon" href="<?php echo BASEURL; ?>/img/icone.ico">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/fontawesome/all.min.css">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
		<title>CRUD com Bootstrap</title>
	</head>
	<!-- Body -->
	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-transparente" data-bs-theme="dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo BASEURL; ?>"><i class="fa-solid fa-house-chimney"></i> CRUD-Bootstrap</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<!-- Clientes -->
						<li class="nav-item">
							<div class="dropdown">
								<a class="nav-link dropdown-toggle text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clientes</a>
								<ul class="dropdown-menu text">
									<li>
										<a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php"><i class="fa-solid fa-user-plus"></i> Novo Cliente</a>
									</li>
									<li>
										<a class="dropdown-item" href="<?php echo BASEURL; ?>customers"><i class="fa-solid fa-users"></i> Gerenciar Clientes</a>
									</li>								
								</ul>
							</div>
						</li>
						<!-- Gerentes -->
						<li class="nav-item">
							<div class="dropdown">
								<a class="nav-link dropdown-toggle text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gerentes</a>
								<ul class="dropdown-menu text">
									<li>
										<a class="dropdown-item" href="<?php echo BASEURL; ?>gerentes/add.php"><i class="fa-solid fa-user-plus"></i> Novo Gerente</a>
									</li>
									<li>
										<a class="dropdown-item" href="<?php echo BASEURL; ?>gerentes"><i class="fa-solid fa-users"></i> Gerenciar Gerentes</a>
									</li>								
								</ul>
							</div>
						</li>
<?php if (isset($_SESSION["user"])): ?>
<?php if ($_SESSION["user"] == "admin"): ?>
						<!-- Usuários -->
						<li class="nav-item">
							<div class="dropdown">
								<a class="nav-link dropdown-toggle text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuários</a>
								<ul class="dropdown-menu text">
									<li>
										<a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php"><i class="fa-solid fa-user-plus"></i> Novo Usuário</a>
									</li>
									<li>
										<a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios"><i class="fa-solid fa-users"></i> Gerenciar Usuários</a>
									</li>								
								</ul>
							</div>
						</li>		
<?php endif; ?>
<?php endif; ?>
					</ul>
					<div class="ms-auto">
<?php if (isset($_SESSION["user"])): ?>
						<a href="<?php echo BASEURL; ?>inc/logout.php" class="nav-link nav-text">Bem Vindo <?php echo $_SESSION["user"]; ?>! <i class="fa-solid fa-person-walking-arrow-right"></i> Desconectar</a>
<?php else: ?>
						<a href="<?php echo BASEURL; ?>inc/login.php" class="nav-link nav-text"><i class="fa-solid fa-user-lock"></i> Login</a>
<?php endif; ?>
					</div>
				</div>
			</div>
		</nav>
		<!-- Main -->
		<main>
