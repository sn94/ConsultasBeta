<?php
  require_once 'MDB2.php';

  //Conectar
  //$mdb2 =& MDB2::connect('pgsql://postgres:postgres@localhost/trabajo');
 $mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');

  if (PEAR::isError($mdb2)) {
      die($mdb2->getMessage());
  }else{
	  
	 // echo  "Conexion exitosa a -- trabajo ";
  }
  
  
  /*
   $mdb2 =& MDB2::connect('pgsql://postgres:94@localhost:5434/trabajo');
   
  if (PEAR::isError($mdb2)) {
      die($mdb2->getMessage());
  } */
  

 
 
    
?>