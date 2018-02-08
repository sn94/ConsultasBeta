<?php
  require_once 'MDB2.php';
  //Conectar
  $mdb2 =& MDB2::connect('pgsql://webr:isaias53-4@172.16.0.18/fotograma');
  if (PEAR::isError($mdb2)) {
      die($mdb2->getMessage());
  } 
   
?>