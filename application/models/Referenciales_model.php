<?php

class Referenciales_model extends CI_Model{
    
    
public function __construct(){
   parent::__construct();
   $this->load->database();
   
}  
    

public function nacionalidades($arg=""){
    $condicion="";
if( $arg !=""){
    $arg=  strtolower(trim( $arg ));$condicion=" where lower(trim(descrip)) like '%$arg%'   limit 5 offset 0";
}else{
    if($arg != "TODO")
    $arg="paraguaya";$condicion=" where lower(trim(descrip)) like '%$arg%'   limit 5 offset 0";
}
    $query= $this->db->query("select idnacio, descrip from nacio ".$condicion);
$queryr=  $query->result_array();
 return $queryr;
}


public function nacionali_json($arg=""){
    $condicion="";
if( $arg !=""){
    $arg=  strtolower(trim( $arg ));$condicion=" where lower(trim(descrip)) like '%$arg%'   limit 5 offset 0";
}
    $query= $this->db->query("select idnacio, descrip from nacio ".$condicion);
$queryr=  $query->result_array();
$jsonq= json_encode(  $queryr);
 return $jsonq;
}


public function lugarFallecimiento(){
$query= $this->db->query("select id, descrip from fallecidos.lugar_falleci");
$queryr=  $query->result_array();
 return $queryr;
}

public function causaFallecimiento(){
$query= $this->db->query("select id, descrip from fallecidos.causa");
$queryr=  $query->result_array();
 return $queryr;
}

public function circunstanciaFallecimiento(){
$query= $this->db->query("select id, descrip from fallecidos.circunstancia");
$queryr=  $query->result_array();
 return $queryr;
}

  
    
    
}
	