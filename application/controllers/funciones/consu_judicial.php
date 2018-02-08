<?php

/** capturas **/
function tiene_captura( $nrodocumento )
{
$datos= false;
    
$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');

  if (PEAR::isError($mdb2)) {  mostrarError($mdb2); die($mdb2->getMessage());
  }else{
  

//registro de causa - el antecedente
$sql= "select cidcap from cap001 where cidcap='".$nrodocumento."' and grupo_esta='1'";

$res1=&  $mdb2->query(  $sql );
if(  PEAR::isError( $res1) ){ mostrarError($res1); die($res1->getMessage());}
else{ 
if(  $res1->numRows() >0){ $datos= true;}
}/** Consulta exitosa  **/
  }/** Conexion exitosa **/
  return $datos;
}



function datos_dependencia( $coddepen )
{
$datos='*****';
    
$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/sistema');

  if (PEAR::isError($mdb2)) { mostrarError($mdb2); die($mdb2->getMessage());
  }else{
  
//registro de causa - el antecedente
$sql="select concat('$coddepen', concat('-',concat(' tel: ', tel))) from pers002p where codigo='$coddepen'";

$res1=&  $mdb2->query(  $sql );
if(  PEAR::isError( $res1) ){ mostrarError($res1); die($res1->getMessage());}
else{ 
$datos=  $res1->fetchRow();
$datos= $datos[0];
}/** Consulta exitosa  **/
  }/** Conexion exitosa **/
  return $datos;
}







/** capturas **/
function obtener_datos_captura( $nrodocumento )
{
    $datos= array();
    
$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');

  if (PEAR::isError($mdb2)) {  mostrarError($mdb2); die($mdb2->getMessage());
  }else{

$mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC); 
             
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

$res1=&  $mdb2->query(  $sql );
if(  PEAR::isError( $res1) ){ mostrarError($res1); die($res1->getMessage());}
else{
$datos=   $res1->fetchAll();
 mostrarError_Developer("sql", $sql);
    
}/** Consulta exitosa  **/
  }/** Conexion exitosa **/
  return $datos;
}



function obtenerTipoEstado($tipo_esta, $situ){
    $tipo="";
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



function detalles_captura($nrodocumento){
    

$sql= "select mov.id, mov.nroced, mov.est_jud, mov.situ,
mov.tipo_esta, 
es.descrip2
from moviestado mov left join est_judi es on mov.est_jud=es.estado 
where nroced='$nrodocumento' ";
$Datos= array();
    
$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');

  if (PEAR::isError($mdb2)) { mostrarError($mdb2); die($mdb2->getMessage());
  }else{
$mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);

$res=&  $mdb2->query(  $sql );
if (PEAR::isError($res)) { mostrarError($res); die($mdb2->getMessage());}
else{
    
$datos=  $res->fetchAll();   
$conta=0;
foreach($datos as $it){
    $Datos[$conta]= array('id'=> $it['id'] ,  'nroced'=> $it['nroced'],
                         'est_jud'=>$it['est_jud'], 'situ'=> $it['situ'],
                         'tipo_esta'=> obtenerTipoEstado($it['tipo_esta'], $it['situ'] ),
                           'descrip'=> $it['descrip2']); $conta++;
}/** en foreach   **/

}/** Consulta bien**/

  }/** Conexion exitosa **/
  return $Datos;
}


function te(){

    $sql= "select orden from cap001 where cidcap='4001082' and orden=1";
    
$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
//$mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);
$res=& $mdb2->query($sql); $indice=1;

while( $tem= $res->fetchRow( )   ){
echo "   orden ->{$tem[0]} indice $indice";$indice++;
 
}

}


?>