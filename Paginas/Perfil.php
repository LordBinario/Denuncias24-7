<div class="row">
	<div class="col-3">
		<div class="card">
			<div class="dropright">
				<img src=<?php if(isset($ImgPerfil)){ echo $ImgPerfil; }else{ echo 'Imagenes/Perfiles/SinFoto.jpg'; } ?> alt="Imagen de perfil" class="card-img-top dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<div id="ImgPerfil" class="dropdown-menu">
					<?php include('Imagenes.php'); ?>
				</div>
			</div>
			<div class="card-body">
				<div id="Carrusel" class="carousel slide" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
					    <div class="carousel-item active">
					      	<form method="post" accept-charset="utf8" action="Paginas/CodigoServidor/ActualizarDatos.php">
					      		<label for="txtUsuario">Usuario anónimo:</label>
								<input type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="Nombre de usuario anónimo" value=<?php echo $Usuario; ?>>
								<br>
								<label for="txtCorreo">Correo:</label>
								<input type="email" id="txtCorreo" name="txtCorreo" class="form-control" placeholder="Correo electrónico" value=<?php echo $Correo; ?>>
								<br>
								<label for="cmbDepto">Departamento:</label>
								<select name="cmbDepto" id="cmbDepto" class="form-control">
									<option value="0">Seleccione su departamento</option>
									<?php include('CodigoServidor/Deptos.php'); ?>
								</select>
								<br>
								<input type="submit" value="Actualizar datos" class="btn btn-block" style="background-color: #00A94F;">
					      	</form>
					    </div>
					    <div class="carousel-item">
					      	<form method="post" accept-charset="utf8" action="Paginas/CodigoServidor/ActualizarContraseña.php">
					      		<label for="txtContraseñaActual">Contraseña actual:</label>
					      		<input type="password" id="txtContraseñaActual" name="txtContraseñaActual" placeholder="Su contraseña actual" class="form-control">
					      		<br>
					      		<label for="txtNuevaContraseña1">Contraseña nueva:</label>
					      		<input type="password" id="txtNuevaContraseña1" name="txtNuevaContraseña1" placeholder="Contraseña nueva" class="form-control">
					      		<br>
					      		<label for="txtNuevaContraseña2">Repetir contraseña nueva:</label>
					      		<input type="password" id="txtNuevaContraseña2" name="txtNuevaContraseña2" placeholder="Repetir contraseña nueva" class="form-control">
					      		<br>
								<input type="submit" value="Actualizar contraseña" class="btn btn-block" style="background-color: #00A94F;">
					      	</form>
					    </div>
					</div>
				  	<a class="carousel-control-prev" href="#Carrusel" role="button" data-slide="prev">
				    	<span class="carousel-control-prev-icon" style="background-color: red;" aria-hidden="true"></span>
				    	<span class="sr-only">Datos</span>
				  	</a>
				  	<a class="carousel-control-next" href="#Carrusel" role="button" data-slide="next">
				    	<span class="carousel-control-next-icon" style="background-color: red;" aria-hidden="true"></span>
				    	<span class="sr-only">Contraseña</span>
				  	</a>
				</div>
			</div>			
		</div>
	</div>

	<div class="col-9">
		<div class="card">
			<h3 class="card-header">Mis denuncias</h3>
			<div class="card-body">
				<input id="btnCrearDenuncia" type="button" value="Hacer denuncia" class="btn text-left" style="background-color: #00A94F;">
				<br>
				<div id="Denuncias" class="text-center">
					<img src="Imagenes/Escudo.png" alt="Escudo nacional" class="img-fluid text-center">
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" charset="utf8">
	function MostrarMenu()
	{
		document.getElementById('R').classList.add('d-none');
		document.getElementById('MenuUsuario').classList.remove('d-none');
	}

	function AsignarEventos()
	{
		document.getElementById('btnCrearDenuncia').addEventListener('click', function(){
			window.location.replace('?Pagina=Denunciar');
		});

		MostrarMenu();
	}

	window.onload = AsignarEventos;
</script>