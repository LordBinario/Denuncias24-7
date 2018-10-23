<?php
	
	try
	{
		$Conexion = mysqli_connect("localhost", "LORDBINARIO", '3nD10$C0nf!@m0$', "denuncias247");
		mysqli_set_charset($Conexion, 'utf8');
		echo mysqli_error($Conexion);
	}
	catch(Exception $e)
	{
		echo 'Error: ' . $e . ' / ' . mysqli_error($Conexion);
	}

?>