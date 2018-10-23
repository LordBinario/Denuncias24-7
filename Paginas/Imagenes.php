<?php

    if(file_exists('Imagenes/Perfiles/'))
    {       
        echo '<h6 class="col-12 text-center dropdown-header">Imágenes de perfil</h6>';
        $i = 0;
        //scandir Devuelve un array con los ficheros y los directorios que se encuentran
        $Imagenes = scandir('Imagenes/Perfiles/');
        foreach($Imagenes as $Imagen)
        {
            //is_dir Indica si el nombre de archivo es un directorio
            if(!is_dir($Imagen) & $Imagen != 'SinFoto.jpg')
            {
                $i++;
                echo '<a href="Paginas/CodigoServidor/ActualizarImgPerfil.php?I='.$Imagen.'"><img src="Imagenes/Perfiles/'.$Imagen.'" alt="Imagen de perfil" class="rounded mb-1 ml-1" width="105px" height="100px"></a>';
                
                if($i == 4)
                {
                    $i = 0;
                    echo '<br>';
                }
            }
        }
    }
    else
    {
        echo '<p class="text-center">No se han podido cargar las imágenes. Recargue la página para intentarlo nuevamente.</p>';
    }

?>