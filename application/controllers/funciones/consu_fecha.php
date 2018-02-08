<?php


function ver_fecha(){
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



?>