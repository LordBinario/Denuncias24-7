<?php
	
	session_start();
	include('Conectar.php');

	function Contraseña_Actual($Contraseña, $Conexion) : bool
	{
		$Query = "CALL CONTRASEÑA_ACTUAL(".$_SESSION['IDUsuario'].");";

		$Cmd = mysqli_query($Conexion, $Query);

		$Lector = mysqli_fetch_row($Cmd);

		if($Lector[0] != $Contraseña)
		{
			return true;
		}

		return false;
	}

	function Contraseñas($Contraseña, $Conexion) : bool
	{
		mysqli_next_result($Conexion);
		$Query = "CALL CONTRASEÑAS('".$_SESSION['IDUsuario']."');";

		$Cmd = mysqli_query($Conexion, $Query);

		if(mysqli_num_rows($Cmd) > 0)
		{
			while($Tabla = mysqli_fetch_array($Cmd))
			{
				if($Tabla[0] == $Contraseña)
				{
					mysqli_free_result($Cmd);
					return true;
				}
			}
		}

		return false;
	}

	try
	{
		if($_POST['txtNuevaContraseña1'] == '' || $_POST['txtNuevaContraseña2'] == '' || $_POST['txtContraseñaActual'] == '')
		{
			echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nFatan datos a ingresar. Verifique.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
		}
		else if($_POST['txtNuevaContraseña1'] != $_POST['txtNuevaContraseña2'])
		{
			echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nLas contraseñas ingresadas para la actualización no son iguales. Verifique.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
		}
		else if($_POST['txtNuevaContraseña1'] == $_POST['txtContraseñaActual'])
		{
			echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nLa nueva contraseña que desea utilizar no puede ser la misma que usa actualmente. Verifique.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
		}
		else if(Contraseña_Actual($_POST['txtContraseñaActual'], $Conexion))
		{
			echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nLa contraseña actual escrita no es la correcta. Verifique.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
		}
		else if(Contraseñas($_POST['txtNuevaContraseña1'], $Conexion))
		{
			echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nLa contraseña ingresada la ha utilizado anteriormente. Por motivos de seguridad ingrese una nueva contraseña.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
		}
		else
		{
			mysqli_next_result($Conexion);
			$Query = "CALL ACTUALIZAR_CONTRASEÑA('".$_SESSION['IDUsuario']."', '".$_POST['txtNuevaContraseña1']."');";
	
			if(mysqli_query($Conexion, $Query))
			{
				echo '<script type="text/javascript" charset="utf8">alert(\'INFORMACIÓN:\nSu contraseña se ha actualizado satisfactoriamente.\'); </script>';
			}
			else
			{
				echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nNo se ha podido actualizar su contraseña. Intente de nuevo.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
			}
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