<?php

	include "../includes/sesiones.php";
	
	$_SESSION['s_login']="OK";

	header("Location: ../index.php?pagina=principal");
				
?>