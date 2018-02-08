<?php
  require_once 'MDB2.php';
  //Conectar
  //$mdb2 =& MDB2::connect('pgsql://webr:pirulo@poldata/cons_histo');
  $mdb2 =& MDB2::connect('pgsql://webr:isaias53-5@172.16.0.18/cons_histo');
  if (PEAR::isError($mdb2)) {
      die($mdb2->getMessage());
  } 
   
?>
