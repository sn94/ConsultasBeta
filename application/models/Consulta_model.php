<?php
	
class Consulta_model extends CI_Model{
    
/** Parametros de
 * busqueda **/
public  $punto_pagina;
 private $tipo_bus;
 private $valor;
private $edad_desde;
private $edad_hasta;
private $sexo;
private $es_oficial;
private $nacionalidad;
private $nacio_origen;
private $vehiculos;/** Tipo de busq. vehiculo, por chapa, por nro de motor, chasis, etc **/
private $txtvehi;/** Valor proporcionado para busq. de vehiculo, puede ser la chapa, el nro. de motor, etc **/

/** Consulta **/
private $sql1="";

private $TAMANO_PAGINA= 5;
private $Nro_de_paginas=0;



    
public function __construct(){
     
parent::__construct(); 
$this->load->database( ); 
$this->load->model("Vehiculo_model"); 
    
}
    


private function obt_Parametros(){
$this->punto_pagina= $this->input->get("punto_pagina");
$this->tipo_bus= $this->input->get("tipo_bus");
$this->valor=  strtoupper($this->input->get("valor")  );
$this->edad_desde= $this->input->get("edad_desde");
$this->edad_hasta= $this->input->get("edad_hasta");
$this->sexo= $this->input->get("sexo");
$this->es_oficial= $this->input->get("es_oficial" );
$id_nacio= $this->Referenciales_model->nacionalidades(  $this->input->get("nacionalidad"));
$id_nacio_ori= $this->Referenciales_model->nacionalidades(  $this->input->get("nacio_origen"));

$this->nacionalidad= $id_nacio[0]['idnacio'];
$this->nacio_origen= "";
$this->vehiculos= $this->input->get("vehiculos");
$this->txtvehi= $this->input->get("txtvehi");
}
    

private function porEdad(){
    
    /** 1   ***/
 /** Por Edad **/    
 $edad1= $this->edad_desde  != '';
 $edad2=  $this->edad_hasta  != '';;
if( $edad1){

if( $edad2){
	$this->sql1= $this->sql1 ." "." and extract( year from age(a.fechanac) ) >=".$this->edad_desde."  and extract( year from age(a.fechanac) ) <= ".$this->edad_hasta." ";
}else{
	$this->sql1= $this->sql1." "." and  extract( year from age(a.fechanac) ) =".$this->edad_desde;
}          }
}


private function porSexo(){
if( $this->sexo  !=  '' ){ $this->sql1=  $this->sql1."  and a.sexo='".$this->sexo."'" ;} 
}


private function porCondicionPolicial(){
 /** Es oficial  **/
if( $this->es_oficial != ''  ){
$IS_POLICE= "(select e.cedpol  from pers001p e where  (e.cedpol=a.nrodoc) )";
$this->sql1=  $this->sql1."  and  ". $IS_POLICE." IS NOT NULL ";
}   
}


private function porNacionalidad(){
    /** Nacionalidad  **/
if( $this->nacionalidad != '' ){
    
$CAPT= "( b.idnacio=".$this->nacionalidad.") ";
$this->sql1=  $this->sql1."  and  ". $CAPT;
} 
}

private function porNacionalidadOrigen(){
    /** Nacionalidad  **/
if( $this->nacio_origen != '' ){
    
$CAPT= "( b.idnacio=".$this->nacio_origen.") ";
$this->sql1=  $this->sql1."  and  ". $CAPT;
} 
}

private function porNombre(){
   
        /** ********** Busqueda por nombre  ******************/
$pr_cadena=  explode(' ', $this->valor);
$this->sql1= $this->sql1 . " and   concat(a.nombre, concat(' ',a.apellido)) like '";
foreach( $pr_cadena as $pr ){ $this->sql1= $this->sql1."%".$pr."%"; } $this->sql1= $this->sql1."'";

$this->porEdad();
$this->porSexo();
$this->porCondicionPolicial();
$this->porNacionalidad();
$this->porNacionalidadOrigen();

  
}



    
private function formarConsulta(){
 $this->obt_Parametros();    
 
 $this->sql1="select a.nrodoc from personas a,nacio b where a.nacio=b.idnacio ";


/**   Busqueda por cedula **/
if( ((int)$this->tipo_bus) == 1 ){  $this->sql1= $this->sql1. " and a.nrodoc='".$this->valor."'";

}else {  

if( ((int)$this->tipo_bus) == 2 ){   $this->porNombre();
        
}elseif(  ((int)$this->tipo_bus) == 3 ){
  
if(  $this->vehiculos != ''  &&   $this->txtvehi != ''  ){
/** LLAMAR A METODO QUE OBTIENE LOS NROS DE DOCUMENTOS DE TITULARES **/
$this->sql1= $this->Vehiculo_model->obtener_SQL_titulares($this->vehiculos,strtoupper( $this->txtvehi )  );
} 
}/** fin busq. vehiculo **/
}/** formas de busqueda diferente a CI **/


}
    
    
    
 
 

   
    
    
public function obtenerPagina(){
$this->formarConsulta();
$this->sql1=  $this->sql1." order by nrodoc ASC";
$datos= array();

/** Setear los limites **/
if( ((int) $this->punto_pagina) > 0)
$this->sql1=  $this->sql1." limit $this->TAMANO_PAGINA offset ".$this->punto_pagina;
else
$this->sql1=  $this->sql1." limit $this->TAMANO_PAGINA offset 0";




if( is_null( $this->sql1) ||  empty($this->sql1)  ){
$this->Utilidades_model->mostrarErroresDeveloper("Recomendacion", "Sin resultados. Modifique los parametros de busqueda.");
}else{
     
$resu1= $this->db->query( $this->sql1);/** Ejecucion del script *****/
$num_row= $resu1->num_rows();/**   Numero de registros ****/


if( $num_row > 0){
$datos= $resu1->result_array();
 
}
else{
$dx['datos']=array('TITULO' => "Sin resultados", 'MENSAJE'=>"No se ha encontrado registros" );
$this->load->view("errors/errores", $dx);
}

}/** Sentencia no vacia **/

 
return $datos;
 }





    
    
    
    
}