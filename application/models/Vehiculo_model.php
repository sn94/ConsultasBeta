<?php
	
class Vehiculo_model extends CI_Model{
    
    
    
public function __construct(){
parent::__construct();
 
$this->load->database( );
$this->load->model("Utilidades_model");    
}
    
    
    
    




public function  obtener_SQL_nros_doc($id_vehic){ 
$retorno=""; 
$res_t=  $this->db->query("select nro_docu from rua.titular where id_vehic=$id_vehic");   
$lista_ci= array();

if(  $res_t->num_rows() >0){
$sql1="select a.nrodoc from personas a where a.nrodoc in (select nro_docu from rua.titular where id_vehic=$id_vehic)";
  $retorno= $sql1;
  // CADENA DE CONSULTA PARA UN TITULAR O MAS
    }/** si hay registros **/
    
   return $retorno;
}







public function obtener_SQL_titulares($ti_bus, $val_b){ 
    
$datos= "";  
$buscar= (int) $ti_bus;
$cad1= "select id from rua.vehiculos where ";

switch($buscar){
case 1: $cad1= $cad1 . " nro_chapa= '$val_b'" ;break;
case 2: $cad1= $cad1 . " nro_chasis='$val_b'";break;
case 3: $cad1= $cad1 . " nro_motor='$val_b'";break;
case 4: $cad1= $cad1 . " nro_chapa='$val_b'";break;
case 5: $cad1= $cad1 . " nro_chapa='$val_b'";break;

}/** fin switch **/


$res_id_v= $this->db->query($cad1) ;
$lista_ids= array();/** Donde guardar los ids **/


    if( $res_id_v->num_rows() >0 ){ $lista_ids=  $res_id_v->result_array(); }/** si hay registros DE IDS de vehiculos **/
    
    if( sizeof(  $lista_ids) >0 ){ 
    
    foreach( $lista_ids as $item){ $ID_VEHI= $item['id'];
   $datos= $this->obtener_SQL_nros_doc($ID_VEHI);
    
    }/** fin foreach **/
    }/** Si lista no esta vacia **/
    else{
  $this->Utilidades_model->mostrarErroresDeveloper("Sin resultados","No se encontro vehiculo con los parametros proporcionados. " );   
    }
      
return $datos;
} /** fin  **/






public function datos_denuncia(  $idv ){
     
$datos= array();
$sq_denuncia="select clave, fecha, nro_chapa, nro_chasis, nro_motor, marca, modelo, tipo_auto, color, separti,
 observa, denuncia, situacion from rua.denuncias ";
 
 $res3= $this->db->query( $sq_denuncia. " where id_vehic=".$idv );  
 $datos=  $res3->result_array();
 
 return $datos; 
 
}




public function datos_vehiculo(  $idv  ){
     
$datos= array();
$sq_vehiculo= "select id, nro_chapa, tipo_vehiculos, marca, modelo, ano_fabrica, ano_modelo, color,
 pais_fabrica, nro_chasis, marca_chasis, nro_motor, tipo_inscripcion, uso, fecha_actu from rua.vehiculos ";
 
 $res3= $this->db->query( $sq_vehiculo. "  where id=".$idv ); 
 $datos=  $res3->result_array; 
 
 return $datos;   
}





/** Obtiene los ids de vehiculos que estan a nombre de un titular con cierto nro de doc **/
public function obtener_vehi_titular(  $nrodocument  ){
     
$datos= array();
$sq_id_vehic="select id_vehic from rua.titular  where  nro_docu='$nrodocument'";
 
 $res3= $this->db->query( $sq_id_vehic  );
  $datos=  $res3->result_array;     
return $datos;  
}







/** Obtiene los ids de vehiculos que estan a nombre de un titular con cierto nro de doc **/
public function obtener_datos_titular(  $idv  ){
    
$datos= array();

 $sq_titular="select  tipo_docu, nro_docu, nombape, nacional, porce_titular from rua.titular ";
  
 $res3= $this->db->query( $sq_titular." where id_vehic='". $idv."'" );
 $datos=  $res3->result_array;  
 return $datos;  
 
}


 
    
    
    
    
    
}