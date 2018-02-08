<?php
  require_once 'MDB2.php';
  //Conectar
  $mdb2 =& MDB2::connect('pgsql://kinguser:JesusMisericordioso@172.16.0.18/sistema');
  // $mdb2 =& MDB2::connect('pgsql://webr:caaguazuguazupry2013@172.16.0.25/sistema');
 //$mdb2 =& MDB2::connect('pgsql://kinguser:elmasganador_1902lao@172.16.0.25/sistema');
  
  if (PEAR::isError($mdb2)) {
      die($mdb2->getMessage());
      echo "<h1>ERROR CONEXION CONESIS</h1>";
  } 
   
?>