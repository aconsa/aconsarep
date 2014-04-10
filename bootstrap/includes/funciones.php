<?php

function fecha_actual()
{  
       $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
       $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
       $year_now = date ("Y");  
       $month_now = date ("n");  
       $day_now = date ("j");  
       $week_day_now = date ("w");  
       $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;   
       return $date;    
} 



//FUNCION PARA LIMPIAR CADENA DE SQLINJECTION
function limpiarcadena($char)
{
	$ban=0;//Bandera para saber si estan ejecutando una Inyeccion SQL
	$char_w_replaced = stripslashes($char);//Guardamos la Inyeccion original para informacion a la BD
	//Array con las palabras reservadas, para modificar a gusto :D
	$hack_array = array("'", '"', ";", "UNION", "union", "DROP", "drop", "table", "TABLE", "SET", "set", "UPDATE", "update", "SELECT", "select", "-", "--", "MEMB_INFO", "memb_info", "memb__pwd", "memb___id"); //Caracter por el que será reemplazada cada palabra reservada del sitio
	$hack_replace = ""; //Separamos la cadena en un Array para poder hacer la comparacion y determinar si estan
	//ejecutando o no una Inyeccion SQL
	$char1=explode(" ",$char);
	for($i=0;$i<count($char1);$i++)
	{
		if(in_array($char1[$i],$hack_array))//si se quiere se puede convertir todo a mayusculas para la comprobacion.
		{
	 		$ban=1;
		}
	}
	
	if ($ban==1)
	{
		$add="ESTAS HACKEANDO SI SI"; 	
	}
	else 
	{
		$add="NO ESTAS HACKEANDO"; 
		//seguir con los procesos del POST o GET sin guardar ips ni nada
	}  
	
	//reemplazamos las palabras reservadas
	$char_replaced = str_replace($hack_array, $hack_replace, $char);
	//evitamos codigos html y espacios en blanco
	$char_clean=htmlentities(trim($char_replaced)); //retornamos la cadena limpia para usar en nuestra consulta, o podemos devolver segun el resultado de ban
	//un die para no ejecutar nada o como se les ocurra
	return $char_clean;
}

?>