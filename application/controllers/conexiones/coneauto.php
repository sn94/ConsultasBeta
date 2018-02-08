<?php
  require_once 'MDB2.php';
  //Conectar
  //$mdb2 =& MDB2::connect('pgsql://webr:pirulo@poldata/vehiculos');
  $mdb2 =& MDB2::connect('pgsql://webr:isaias53-5@172.16.0.25/trabajo');
  if (PEAR::isError($mdb2)) {
      die($mdb2->getMessage());
  } 
   
?>
