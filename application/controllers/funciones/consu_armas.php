<?php




function  obt_portacion_de_armas($nrodocumento){


 $sql_movi = "select  tra.id_por, tra.nrodoc, tra.id_arma, tra.serie_nro, ar.tipo_arma, ar.tipo_uso, 
 ar.calibre, ar.marca, nacio.descrip as procede, ar.situacion 
 from transfe tra 
 left join armas ar left join nacio on ar.procedencia=nacio.idnacio on tra.id_arma=ar.id_arma 
  where tra.nrodoc='$nrodocumento'  order by ar.tipo_arma, ar.serie_nro";
 

$sql1= "select por.nrodoc, pro.descripcion as profesion,  por.tipodoc, nacio.descrip as nacio, por.usuario, por.fecha_ing, por.decreto_nro,
 porechagrab, por.servi_porta, por.otro_doc, por.nombre, por.apellido, por.fechanac, por.lugnac, por.domicilio, por.estado, por.motivo,
por.barrio_ciudad, por.telefono, por.celular, per.descri4 as lug_servi, por.promocion, por.credpol, gra.descrip as grado_actual, por.motibaja,
por.anti.fgue, por.fecha_baja
from policias por
left join pers002p per on por.lug_servi=per.codigo
left join grado gra on por.grado_actual=gra.id
left join nacio on por.nacio=nacio.idnacio
left join profesiones pro on por.profesion=pro.idprofesiones
where nrodoc='$nrodocumento'";

$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/armas');
$datos=  array();

  if (PEAR::isError($mdb2)) {
     mostrarError( $mdb2);
      die($mdb2->getMessage());
      
  }else{
 $mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);

 $res15 =& $mdb2->query($sql_movi);
 
if (PEAR::isError($res15)) {  mostrarError( $res15); die($res15->getMessage()); }
else{
   $datos=  $res15->fetchAll(); 
}/** Consulta exitosa **/

  
  }/** Conexion correcta **/
 
}








?>