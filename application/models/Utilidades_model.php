<?php
	
class Utilidades_model extends CI_Model{
    
    
    
public function __construct(){
    parent::__construct(); 
    $this->load->database();
}

 

public function getTodayDate(){
date_default_timezone_set("America/Asuncion");
$anio=date("Y")."/".date("m")."/".date("d");  return  $anio;
}


public function calcEdad($fecha_nacimiento){
date_default_timezone_set("America/Asuncion");

$dia=date("d");
$mes=date("m");
$ano=date("Y");


$dianaz=date("d",strtotime($fecha_nacimiento));
$mesnaz=date("m",strtotime($fecha_nacimiento));
$anonaz=date("Y",strtotime($fecha_nacimiento));


//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

if (($mesnaz == $mes) && ($dianaz > $dia)) {
$ano=($ano-1); }

//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

if ($mesnaz > $mes) {
$ano=($ano-1);}

 //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
$edad=($ano-$anonaz);

return $edad;
}



public function ver_fecha(){ 
date_default_timezone_set("America/Asuncion");

$dia_st= date("N");// 1 al 7
$dia= date("d");// 1 al 31 
$mes= date("n");//1 al 12
$anio= date("Y"); 
$messtr="";
$diastr="";

switch( (int)$dia_st){
  case 1:  $diastr= "Lunes";break;
  case 2: $diastr="Martes";break;
  case 3:  $diastr= "Miercoles";break;
  case 4: $diastr="Jueves";break;
  case 5:  $diastr= "Viernes";break;
  case 6: $diastr="Sabado";break;
  case 7:  $diastr= "Domingo";break;
}

switch( (int)$mes){
  case 1:  $messtr= "Enero";break;
  case 2: $messtr="Febrero";break;
  case 3:  $messtr= "Marzo";break;
  case 4: $messtr="Abril";break;
  case 5:  $messtr= "Mayo";break;
  case 6: $messtr="Junio";break;
  case 7:  $messtr= "Julio";break;
  case 8: $messtr="Agosto";break;
  case 9:  $messtr= "Setiembre";break;
  case 10: $messtr="Octubre";break;
    case 11:  $messtr= "Noviembre";break;
  case 12: $messtr="Diciembre";break;
} 
   
   $retorno= $diastr.", ".$dia.", ".$messtr." , ". $anio;
   return $retorno;
}
    
    
    
    
    
    
    
public function mostrarErroresDeveloper($titulo, $mensaje){
      

echo "<div class='alert alert-warning alert-dismissable'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>". $titulo."</strong>". $mensaje."</div>";
  
}
    
    
    
    
    
}