<!DOCTYPE html>
<html>
<head>
	<title>Denuncias | Nicaragua 24/7</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/Personalizado.css">
</head>
<body>
	<?php include('Paginas/CodigoServidor/DatosUsuario.php'); ?>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0271BA;">
	  	<a class="navbar-brand" href="?Pagina=principal">Grupo Binario</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>

	  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    	<ul class="navbar-nav mr-auto">
		      	<li class="nav-item active">
		        	<a class="nav-link" href="?Pagina=principal">Inicio<span class="sr-only">(current)</span></a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="?Pagina=Denuncias">Ver denuncias</a>
		      	</li>
		      	<li id="R" class="nav-item">
		        	<a class="nav-link" href="?Pagina=Credenciales">Registrarse / Iniciar sesión</a>
		      	</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown dropleft d-none" id="MenuUsuario">
		        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          		Usuario: <?php if(isset($Usuario)){ echo $Usuario; } ?>
		        	</a>
		        	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          		<a class="dropdown-item" href="?Pagina=Perfil">Mi perfil</a>
		          		<div class="dropdown-divider"></div>
		          		<a class="dropdown-item" href="Paginas/CodigoServidor/CerrarSesion.php">Cerrar sesión</a>
		        	</div>
		      	</li>
			</ul>
	  	</div>
	</nav>
	<br>
	<div class="container-fluid">