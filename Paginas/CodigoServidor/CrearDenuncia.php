<?php

    include('Conectar.php');

    try
    {
        $Band = false;
        if($_POST['txtTitulo'] == "" || $_POST['txtDescripcion'] == "")
        {
            echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nFaltan datos por ingresar. Verifique.\'); window.location.replace(\'../../?Pagina=Denunciar\');</script>';
        }
        else
        {
            if(file_exists($_POST['txtID']))
            {
                $Band = true;
            }
            else
            {
                if(mkdir($_POST['txtID'], 0444, false))
                {
                    $Band = true;
                }
                else
                {
                    $Band = false;
                }
            }
            
            if($Band)
            {
                session_start();
                $i = 0;
                var_dump($_FILES["FileAdjuntes"]['tmp_name']);
                echo (count($_FILES['FileAdjuntes']['tmp_name'])) . ' - ';
                foreach($_FILES["FileAdjuntes"]['tmp_name'] as $Adjunte)
                {   
                    echo (count($_FILES['FileAdjuntes']['tmp_name']));
                    if(move_uploaded_file($Adjunte, $_POST['txtID'] . $_FILES["FileAdjuntes"]['name'][$i]))
                    {
                        $Query = "CALL CREAR_DENUNCIA('".$_SESSION['IDUsuario']."', '".$_POST['txtTitulo']."', '".$_POST['txtDescripcion']."', '".$_POST['lblFecha']."', '".$_POST['txtID'] . $_FILES['FileAdjuntes']['name'][$i] ."');";
                        
                        if(mysqli_query($Conexion, $Query) && (count($_FILES['FileAdjuntes']['tmp_name']) - 1) == $i)
                        {
                            echo '<script type="text/javascript" charset="utf8">alert(\'INFORMACIÓN:\nSu denuncia ha sido creada satisfactoriamente.\'); //window.location.replace(\'../../?Pagina=Denunciar\');</script>';
                        }
                        else
                        {
                            echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nSu denuncia no ha podido ser creada. Intente de nuevo.\'); //window.location.replace(\'../../?Pagina=Denunciar\');</script>';
                        }                        
                        $i += 1;
                    }
                    else
                    {
                        echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nNo se ha podido adjuntar el archivo ' . $_FILES['FileAdjuntes']['name'][$i] . '. Intente de nuevo.\'); //window.location.replace(\'../../?Pagina=Denunciar\');</script>';
                    }
                }
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