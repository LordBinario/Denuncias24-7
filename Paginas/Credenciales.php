<div class="row card">
	<img id="credenciales" src="Imagenes/Credenciales.png" alt="Imagen credenciales" class="card-img mx-auto" height="610px">
	<div class="col-12 card-img-overlay">
		<div class="row justify-content-center">
			<form accept-charset="utf8" action="Paginas/CodigoServidor/Logueo.php" method="post" class="col-3">
				<h3 class="text-center">Inicio de sesión</h3>
				<br>
				<label for="txtUsuario">Usuario</label>
				<input	type="text"	class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Su usuario anónimo">
				<br>
				<label for="txtContraseña">Contraseña</label>
				<input type="password" class="form-control" id="txtContraseña" name="txtContraseña" placeholder="Su contraseña">
				<br>
				<input type="submit" class="btn btn-block" value="Iniciar sesión" style="background-color: #00A94F;"> 
			</form>
			<form accept-charset="utf8" action="Paginas/CodigoServidor/Registro.php" method="post" class="col-3">
				<h3 class="text-center">Registro en la web</h3>
				<br>
				<label for="txtUAnonimo">Usuario</label>
				<input type="text" id="txtUAnonimo" name="txtUAnonimo" class="form-control" placeholder="Usuario anónimo">
				<br>
				<label for="cmbDepto">Departamento</label>
				<select id="cmbDepto" name="cmbDepto" class="form-control">
					<option value="0">Seleccione su departamento</option>
					<?php include('CodigoServidor/Deptos.php'); ?>
				</select>
				<br>
				<label for="txtCorreo">Correo</label>
				<input type="email" id="txtCorreo" name="txtCorreo" class="form-control" placeholder="Su correo electrónico">
				<br>
				<label for="txtUContraseña1">Contraseña</label>
				<input type="password" class="form-control" placeholder="Contraseña alfanumérica" id="txtUContraseña1" name="txtUContraseña1">
				<br>
				<label for="txtUContraseña2">Contraseña</label>
				<input type="password" class="form-control" placeholder="Repetir contraseña alfanumérica" id="txtUContraseña2" name="txtUContraseña2">
				<br>
				<input type="submit" class="btn btn-block" value="Registrarse" style="background-color: #00A94F;"> 		
			</form>				
		</div>	
	</div>
</div>