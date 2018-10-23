<?php

	include('Conectar.php');

	try
	{
		$Query = "CALL INICIO_SESION('".$_POST['txtUsuario']."', '".$_POST['txtContraseña']."');";

		$Cmd = mysqli_query($Conexion, $Query);

		if(mysqli_num_rows($Cmd) > 0)
		{
			session_start();
			$Lector = mysqli_fetch_row($Cmd);
			$_SESSION['IDUsuario'] = $Lector[0];
			echo '<script type="text/javascript" charset="utf8">window.location.replace(\'../../?Pagina=Perfil\');</script>';
		}
		else
		{
			echo '<script type="text/javascript" charset="utf8">alert(\'INFORMACIÓN:\nUsuario y/o contraseña incorrectos. Intente de nuevo.\'); window.location.replace(\'../../?Pagina=Credenciales\');</script>';
		}
	}
	catch(Exception $e)
	{
		echo 'Error: ' . $e . ' / ' . mysqli_error($Conexion);
	}
	finally
	{
		include('Desconectar.php');
	}

?>