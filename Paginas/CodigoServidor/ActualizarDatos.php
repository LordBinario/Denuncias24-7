<?php

	include('Conectar.php');

	try
	{
		if($_POST['txtUsuario'] == "" || $_POST['txtCorreo'] == "" || $_POST['cmbDepto'] == 0)
		{
			echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nFaltan datos por ingresar. Verifique.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
		}
		else
		{
			session_start();
			$Query = "CALL ACTUALIZAR_DATOS('".$_SESSION['IDUsuario']."', '".$_POST['txtUsuario']."', '".$_POST['txtCorreo']."', '".$_POST['cmbDepto']."');";

			if(mysqli_query($Conexion, $Query))
			{
				echo '<script type="text/javascript" charset="utf8">alert(\'INFORMACIÓN:\nSus datos se han actualizado satisfactoriamente.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
			}
			else
			{
				echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nNo se ha podido actualizar sus datos. Intente de nuevo.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
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