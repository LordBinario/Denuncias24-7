<?php

include('Paginas/PaginasMaestras/EncabezadoPagina.php');

if(isset($_GET['Pagina']))
{
	if(is_null($_GET['Pagina']) || empty($_GET['Pagina']))
	{
		include('Paginas/principal.php');
	}
	else
	{
		if(is_file('Paginas/' . $_GET['Pagina'] . '.php'))
		{
			if($_GET['Pagina'] == "Perfil" && !isset($_SESSION['IDUsuario']))
			{
				echo '<script type="text/javascript" charset="utf8">alert(\'ADVERTENCIA:\nDebe iniciar sesión para acceder a su perfil.\'); window.location.replace(\'?Pagina=Principal\');</script>';
			}
			else
			{
				include('Paginas/' . $_GET['Pagina'] . '.php');
			}
		}
		else
		{
			include('Paginas/Error.php');
		}
	}
}
else
{
	include('Paginas/principal.php');
}

include('Paginas/PaginasMaestras/PiePagina.php');

?>