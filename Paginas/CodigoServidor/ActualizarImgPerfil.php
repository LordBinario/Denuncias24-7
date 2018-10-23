<?php

    include('Conectar.php');

    try
    {
        session_start();
        $Query = "CALL ACTUALIZAR_IMGPERFIL('".$_SESSION['IDUsuario']."', 'Imagenes/Perfiles/".$_GET['I']."');";

        if(mysqli_query($Conexion, $Query))
        {
            echo '<script type="text/javascript" charset="utf8">alert(\'INFORMACIÓN:\nSu imagen de perfil ha sido actualizada satisfactoriamente.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
        }
        else
        {
            echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nNo se ha podido actualizar su imagen de perfil. Intente de nuevo.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
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