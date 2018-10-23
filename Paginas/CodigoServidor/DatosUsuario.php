<?php

    session_start();
    if(isset($_SESSION['IDUsuario']))
    {
        include('Conectar.php');

        try
        {
            $Query = "CALL DATOS_USUARIO('".$_SESSION['IDUsuario']."');";

            $Cmd = mysqli_query($Conexion, $Query);

            if(mysqli_num_rows($Cmd) > 0)
            {
                $Lector = mysqli_fetch_row($Cmd);
                $Usuario = $Lector[0];
                $Correo = $Lector[1];
                $ImgPerfil = $Lector[2];
                $IDDepto = $Lector[3];
            }
            else
            {
                echo '<script type="text/javascript" charset="utf8">alert(\'ADVERRTENCIA:\nNo se ha podido cargar sus datos. Recargue la página o inicie sesión nuevamente.\'); window.location.replace(\'../../?Pagina=Perfil\');</script>';
            }
            
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e . ' / ' . mysqli_query($Conexion);
        }
        finally
        {
            include('Desconectar.php');
        }
    }

?>