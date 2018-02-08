<?php
	
    
function datos_domicilio( $nrodocu){
 
 $datos= array();

 $mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');

  if (PEAR::isError($mdb2)) {
      die($mdb2->getMessage());
  }else{
  
  $sql="select domicilio,domicilio_nro,telefono,tipo_domicilio, barrio_ciudad,referencia 
  from perso_domicilio where nrodoc='$nrodocu'";
  
  $res = $mdb2->query($sql);
if (PEAR::isError($res)) {
echo "Error en consulta. O no existe tabla. Metodo datos_domicilio";
die($res->getMessage());
}else{
    $mdb2->setFetchMode(MDB2_FETCHMODE_ASSOC);
$datos = $res->fetchAll();

 
}/** Consulta exitosa**/
     }/** "Conexion exitosa a -- trabajo **/
     return  $datos;
}




function movi_domicilio( $nrodocu){

  $sql12="select domicilio,domicilio_nro,telefono, mail, referencia, coordenada, observa
    from residencia.movi_domicilio
   where nrodoc='$nrodocu' order by fechagra desc";
   $mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
$datos= array();

  if (PEAR::isError($mdb2)) {
     mostrarError( $mdb2);
      die($mdb2->getMessage());
  }else{
    $mdb2->setFetchMode(MDB2_FETCHMODE_ASSOC);
    $res= $mdb2->query( $sql12 );
    if( PEAR::isError( $res )){
       mostrarError($res);
       die($res->getMessage());
    }else{   $datos= $res->fetchAll();  }/** Consulta exitosa **/
  
  }/** Conexion exitosa  **/
   return $datos; 
}






    

?>