<?php

function Conectarse()
{
  
   if (!($link=mssql_connect("wsacstrt0150","","")))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mssql_select_db("qcd152",$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $link;
}
 
$link=Conectarse();

?>
