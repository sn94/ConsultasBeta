<?php
	
class RegistroJudicial_model extends CI_Model{
    
  private $DB1;
  private $DB2; 
  
  
    public function __construct(){
        
        parent::__construct();
        $this->DB1= $this->load->database('default', TRUE);
        $this->DB2= $this->load->database('sistema', TRUE);
        $this->load->model("Utilidades_model");
    }
    
    
    
public function datos_dependencia( $coddepen )
{
$datos='*****';
  
//registro de causa - el antecedente
$sql="select concat('$coddepen', concat('-',concat(' tel: ', tel))) as campo from pers002p where codigo='$coddepen'";
$res1=  $this->DB2->query(  $sql );
$row= $res1->row_array();
if (isset($row))
{
   $datos= $row['campo']; 
}
 
 return $datos;
}







/** capturas **/
public function obtener_datos_captura( $nrodocumento )
{
    $datos= array();   
//registro de causa - el antecedente
$sql= "select cidcap,orden,clave,causa,unidad,fecnota,nronota,compete,turno,circun,
lugarh,juez,secreta,interino,fechagra,horagra,usuario,est_jud,observa2,observa,
(CASE WHEN situ='S' THEN 'Sobres.'
   WHEN situ='P' THEN 'Presc./Causa'   
   WHEN situ='E' THEN 'Ext./A.Penal'
   WHEN situ='EP' THEN 'Ext./Pena'
   WHEN situ='H'  THEN 'Habeas Data'
   WHEN situ='HC' THEN 'Habeas Corpus'
   WHEN situ='N' THEN 'Nulidad'
   WHEN situ='A' THEN 'Absolucion'
   WHEN situ='C' THEN 'Compurgamiento de Pena'
   WHEN situ='IP' THEN 'Indulto Presidencial'
   WHEN situ='BR' THEN 'Borrado por Orden Judicial'
END) as situ,
(CASE WHEN tipose='' THEN concat('** Sin Dato ** ', concat('-', nrose))  
ELSE concat(tipose, concat('-', nrose)) END) as tipose, nrose,depend,
(CASE WHEN trim(autoridad)='J' THEN 'Juez'
            WHEN autoridad='' THEN 'Juez'
            WHEN autoridad='F' THEN 'Fiscal'
            WHEN autoridad='O' THEN 'Otros'
            ELSE 'Juez'
       END) as autoridad, 
       
COALESCE( nrocausa,'*******') as nrocausa ,
(CASE WHEN fechaini='1777-07-07' THEN '' ELSE to_char(fechaini,'dd Mon YYYY') END) as fechaini,
 (CASE  WHEN fechafin='1777-07-07' THEN '' ELSE to_char(fechafin,'dd Mon YYYY') END) as fechafin,
horaini,horafin, dias_restri,grupo_esta,clave_aux, COALESCE(nro_exp, '******') as nro_exp,dictamen,califica_final from cap001 
 where cidcap='".$nrodocumento."'  order by orden";

$res1=  $this->DB1->query(  $sql );
$datos=   $res1->result_array(); 
$c=0;
foreach( $datos as $it){
  $dependencia= $it['depend'];
  $dependencia= $this->datos_dependencia( $dependencia );
  $datos[ $c]['depend']= $dependencia; $c++;
}
  return $datos;
}



private function obtenerTipoEstado($tipo_esta, $situ){
    $tipo="";
    $tipo_esta= (int)$tipo_esta;
    if (($tipo_esta==8) and ($situ!='A') and ($situ!='E') and ($situ!='H') and ($situ!='N') and ($situ!='P') and ($situ!='S')){
	$tipo='POSEE ANTECEDENTES PENDIENTES';
}else{
$tipo='ANTECEDENTES SOLUCIONADOS';
}

if (($tipo_esta!=8) and ($tipo_esta!=1) and ($tipo_esta!=2) and ($tipo_esta!=3) and ($tipo_esta!=4) and ($tipo_esta!=5)){
$tipo='NINGUNA';
}else{
if($tipo_esta==1){ 	$tipo='MEDIDAS JUDICIALES PENDIENTES';	}
		if($tipo_esta==2){	$tipo='MEDIDAS CAUTELARES PENDIENTES';	}
		if($tipo_esta==3){	$tipo='PROHIBICIONES PENDIENTES';	}
		if($tipo_esta==4){	$tipo='PROHIBICION SALIR DEL PAIS';}
		if($tipo_esta==5){	$tipo='MEDIDAS ALTERNATIVAS PENDIENTES';	}
}  return $tipo;
}/** **/



public function detalles_captura($nrodocumento){
    

$sql= "select mov.id, mov.nroced, mov.est_jud, mov.situ,
mov.tipo_esta, 
es.descrip2
from moviestado mov left join est_judi es on mov.est_jud=es.estado 
where nroced='$nrodocumento' ";
$Datos= array(); 

$res=  $this->DB1->query(  $sql );

$datos=  $res->result_array();   
$conta=0;
foreach($datos as $it){
    $Datos[$conta]= array('id'=> $it['id'] ,  'nroced'=> $it['nroced'],
                         'est_jud'=>$it['est_jud'], 'situ'=> $it['situ'],
                         'tipo_esta'=> $this->obtenerTipoEstado($it['tipo_esta'], $it['situ'] ),
                           'descrip'=> $it['descrip2']); $conta++;
}/** en foreach   **/
 
   
  return $Datos;
}


}