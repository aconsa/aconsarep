<?php
	include "includes/sesiones.php";
	include "includes/header.php";	
	include "includes/funciones.php";	

	if (isset($_GET['pagina']))
	{
		$pagina = $_GET['pagina'];

				if (is_file("paginas/$pagina.php"))
				{
					if (isset($_SESSION['s_login']) && $_SESSION['s_login'] == "OK")
					{
						
						if($pagina!="salir")
						{
							include "includes/menu.php";
						}
				
						include "paginas/$pagina.php";
					}
					else
					{
						include "paginas/login.php";
					}
				}
				else
				{
					header("Location: index.php?pagina=error");
				}		
	
	}
	else
	{
		if (isset($_SESSION['s_login']) && $_SESSION['s_login'] == "OK")
			header("Location: index.php?pagina=principal");
		else
			include "paginas/login.php";
	
	}


	include "includes/footer.php";
	
?>