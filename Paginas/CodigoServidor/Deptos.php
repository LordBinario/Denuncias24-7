<?php

	include('Conectar.php');

	try
	{
		$Query = "CALL MOSTRAR_DEPTOS();";

		$Cmd = mysqli_query($Conexion, $Query);

		while($Tabla = mysqli_fetch_array($Cmd))
		{
			if(isset($IDDepto) && $IDDepto == $Tabla[0])
			{ 
				echo '<option value="'.$Tabla[0].'" selected>'.$Tabla[1].'</option>';
			}
			else
			{
				echo '<option value="'.$Tabla[0].'">'.$Tabla[1].'</option>';
			}
		}
	}
	catch(Exception $e)
	{
		echo 'Error: ' . $e;
	}
	finally
	{
		include('Desconectar.php');
	}

?>