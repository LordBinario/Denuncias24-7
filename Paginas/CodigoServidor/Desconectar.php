<?php

	try
	{
		if ($Conexion)
		{
			mysqli_close($Conexion);
		}		
	}
	catch(Exception $e)
	{
		echo 'Error: ' . $e;
	}

?>