<?php

    include('Conectar.php');

    try
    {
        $Query = "CALL IDDENUNCIA();";

        $Cmd = mysqli_query($Conexion, $Query);

        $Lector = mysqli_fetch_row($Cmd);
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