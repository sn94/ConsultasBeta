<?php
  require_once 'MDB2.php';
  //Conectar
   $mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
  if (PEAR::isError($mdb2)) {
      die($mdb2->getMessage());
  } 
    
?>