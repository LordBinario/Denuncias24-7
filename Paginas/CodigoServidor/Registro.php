<?php

	include('Conectar.php');

	try
	{
		if($_POST['txtUContraseña1'] != $_POST['txtUContraseña2'])
		{
			echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\\nLas contraseñas ingresadas para el registro no son iguales. Verifique.\'); window.location.replace(\'../../?Pagina=Credenciales\');</script>';
		}
		else
		{
			$Query = "CALL REGISTRO('".$_POST['txtUAnonimo']."', '".$_POST['txtCorreo']."', '".$_POST['txtUContraseña1']."', '".$_POST['cmbDepto']."');";

			if(mysqli_query($Conexion, $Query))
			{
				echo '<script type="text/javascript" charset="utf8">alert(\'INFORMACIÓN:\\nSe ha registrado satisfactoriamente. Puede iniciar sesión.\'); window.location.replace(\'../../?Pagina=Credenciales\');</script>';
			}
			else
			{
				echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\\nNo se a podido realizar el registro. Intente de nuevo.\'); window.location.replace(\'../../?Pagina=Credenciales\');</script>';
			}
			echo mysqli_error($Conexion);
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