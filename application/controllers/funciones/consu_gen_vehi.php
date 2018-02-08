<?php




public function  obtener_SQL_nros_doc($id_vehic){
   $mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
$retorno="";
  if (PEAR::isError($mdb2)) {
    mostrarError( $mdb2 );
      die($mdb2->getMessage());
  }else{
	  
	$mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);
 
$res_t=&  $mdb2->query("select nro_docu from rua.titular where id_vehic=$id_vehic");   
$lista_ci= array();


   if( PEAR::isError($res_t) ){
   mostrarError( $res_t);
 die( $res_t->getMessage() );
}else{   
    if(  $res_t->numRows() >0){
$sql1="select a.nrodoc from personas a where a.nrodoc in (select nro_docu from rua.titular where id_vehic=$id_vehic)";
  $retorno= $sql1;
  // CADENA DE CONSULTA PARA UN TITULAR O MAS
    }/** si hay registros **/
   
}/** consulta ok **/
  }   return $retorno;
}







public function obtener_SQL_titulares($ti_bus, $val_b){
    
$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
$datos= "";

  if (PEAR::isError($mdb2)) {
    mostrarError( $mdb2);
      die($mdb2->getMessage());
  }else{
	   $mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);

$buscar= (int) $ti_bus;
$cad1= "select id from rua.vehiculos where ";

switch($buscar){
case 1: $cad1= $cad1 . " nro_chapa= '$val_b'" ;break;
case 2: $cad1= $cad1 . " nro_chasis='$val_b'";break;
case 3: $cad1= $cad1 . " nro_motor='$val_b'";break;
case 4: $cad1= $cad1 . " nro_chapa='$val_b'";break;
case 5: $cad1= $cad1 . " nro_chapa='$val_b'";break;

}/** fin switch **/


$res_id_v=& $mdb2->query($cad1) ;
$lista_ids= array();/** Donde guardar los ids **/

if( PEAR::isError($res_id_v) ){
   mostrarError( $res_id_v);
 die( $res_id_v->getMessage() );
}else{
    if( $res_id_v->numRows() >0 ){ $lista_ids=  $res_id_v->fetchAll(); }/** si hay registros DE IDS de vehiculos **/
    
    if( sizeof(  $lista_ids) >0 ){ 
    
    foreach( $lista_ids as $item){ $ID_VEHI= $item['id'];
   $datos= obtener_SQL_nros_doc($ID_VEHI);
    
    }/** fin foreach **/
    }/** Si lista no esta vacia **/
    else{
    mostrarError_Developer("Sin resultados","No se encontro vehiculo con los parametros proporcionados. " );   
    }
    
}/** consulta ok **/ 
  }/** conexion ok   **/
return $datos;
} /** fin  **/






public function datos_denuncia(  $idv ){
    
   $mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
$datos= array();

  if (PEAR::isError($mdb2)) {
    mostrarError( $mdb2);
      die($mdb2->getMessage());
  }else{
	   $mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);
       
        $sq_denuncia="select clave, fecha, nro_chapa, nro_chasis, nro_motor, marca, modelo, tipo_auto, color, separti,
 observa, denuncia, situacion from rua.denuncias ";
 
 $res3=& $mdb2->query( $sq_denuncia. " where id_vehic=".$idv );
 if( PEAR::isError($res3)){ mostrarError( $res3);}
 else{ 
 $datos=  $res3->fetchAll();
 }
 return $datos; 

}/** conexion exitosa **/ 
     
 
}




public function datos_vehiculo(  $idv  ){
    
   $mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
$datos= array();
  if (PEAR::isError($mdb2)) {
    mostrarError(  $mdb2 );
      die($mdb2->getMessage());
  }else{
	   $mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);
       
      $sq_vehiculo= "select id, nro_chapa, tipo_vehiculos, marca, modelo, ano_fabrica, ano_modelo, color,
 pais_fabrica, nro_chasis, marca_chasis, nro_motor, tipo_inscripcion, uso, fecha_actu from rua.vehiculos ";
 
 $res3=& $mdb2->query( $sq_vehiculo. "  where id=".$idv );
 if( PEAR::isError( $res3 )){  mostrarError($res3); die($mdb2->getMessage());
 }else{ $datos=  $res3->fetchAll(); } 
 
 return $datos;  
}/** conexion exitosa **/ 
}





/** Obtiene los ids de vehiculos que estan a nombre de un titular con cierto nro de doc **/
public function obtener_vehi_titular(  $nrodocument  ){
    
   $mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
$datos= array();

  if (PEAR::isError($mdb2)) {
    mostrarError( $mdb2 );
      die($mdb2->getMessage());
  }else{
	   $mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);
       
 $sq_id_vehic="select id_vehic from rua.titular  where  nro_docu='$nrodocument'";
 
 $res3=& $mdb2->query( $sq_id_vehic  );
if( PEAR::isError($res3)){
    mostrarError( $res3 );die($mdb2->getMessage());
}else{ $datos=  $res3->fetchAll();   }   
}/** conexion exitosa **/ 
return $datos;  
}







/** Obtiene los ids de vehiculos que estan a nombre de un titular con cierto nro de doc **/
public function obtener_datos_titular(  $idv  ){
    
   $mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');

$datos= array();

  if (PEAR::isError($mdb2)) {
    mostrarError( $mdb2);
      die($mdb2->getMessage());
  }else{
	   $mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);
       
 $sq_titular="select  tipo_docu, nro_docu, nombape, nacional, porce_titular from rua.titular ";
  
 $res3=& $mdb2->query( $sq_titular." where id_vehic='". $idv."'" );
 if( PEAR::isError( $res3)){   mostrarError( $res3);
 }else{
 $datos=  $res3->fetchAll();  
 }
}/** conexion exitosa **/ 
return $datos;  
 
}





?>