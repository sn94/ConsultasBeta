<?php
require_once("MDB2.php");

 

$ci= $_POST["ci"];
$lugar= $_POST["lugar"];
$causa= $_POST["causa"];
$jurisdicc= $_POST["jurisdiccion"];
$hora_f= $_POST["horaf"];
$fecha_f= $_POST["fechaf"];
$obs= $_POST[ "obs" ];
$med_for= $_POST["medicof"];
$interv= $_POST["intervinientes"];
$circuns= $_POST[ "circunstancia"];
$usu= $_POST["usu"];
$fechag= $_POST["fechag"];
$dependencia= $_POST["dependencia"];

 echo $ci. " ". $lugar;
 
 
$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
$datos=  array();

  if (PEAR::isError($mdb2)) {
     mostrarError( $mdb2);
      die($mdb2->getMessage());
      
  }else{
    
    
  }/** conexion exitosa **/
?>