<?php



function obtDatosPersonales($nrodocu){
    

 
$sql= "select a.tipodoc,a.nrodoc,a.nropro,a.nombre,a.apellido,a.fechanac,b.descrip as nac_desc,
  c.descrip as nacio_orig,a.lugnac, 
  
   (case when a.sexo='M' then 'MASCULINO' 
  else 'FEMENINO' end ) as sexo,
  
  (case when a.sexo='M' then (
  case when a.estado_civil='SO' then 'SOLTERO' 
   when a.estado_civil='CA' then 'CASADO' 
   when a.estado_civil='SE' then 'SEPARADO' 
   when a.estado_civil='DI' then 'DIVORCIADO' 
   when a.estado_civil='VI' then 'VIUDO' 
   when a.estado_civil='ME' then 'MENOR'  end ) 
  else  (
  case when a.estado_civil='SO' then 'SOLTERA' 
   when a.estado_civil='CA' then 'CASADA' 
   when a.estado_civil='SE' then 'SEPARADA' 
   when a.estado_civil='DI' then 'DIVORCIADA' 
   when a.estado_civil='VI' then 'VIUDA' 
   when a.estado_civil='ME' then 'MENOR'  end )     end ) as estado_civil,
  
  d.descripcion as profesion,a.domicilio,a.barrio_ciudad, 
  a.telefono,a.celular,a.padre_cedul,a.padre_nombre, a.padre_apelli,a.madre_cedul,a.madre_nombre,a.madre_apelli,
  a.conyu_cedul,a.conyu_nombre,a.conyu_apelli, a.ubicacion,a.fechaimp, a.fech_activa,a.fech_vencim,a.donante_org,
  a.orig_datos,a.fechagra,a.usuario,
  (case when (e.cedpol is not null) then 'si' else 'no' end) as ispolice,
  (case when (e.cedpol is not null) then
  (case when e.estado='ACTIVO' then 'ES PERSONAL POLICIAL' 
  when (e.estado='INACTIVO' and e.motibaja='BAJA') then  'PERSONAL POLICIAL DADO DE BAJA' 
  when (e.estado='INACTIVO' and e.motibaja='PASE A RETIRO') then 'PERSONAL POLICIAL EN SITUACION DE RETIRO' 
  end  
  ) 
  else 'NO ES PERSONAL POLICIAL' end ) as cedpol,
  e.estado,e.motibaja,age(fechanac) as edad50  from personas a 
  left join nacio b on (b.idnacio=a.nacio) left join nacio c on (c.idnacio=a.nacio_orig) left join profesiones d on 
  (d.idprofesiones=a.profesion) left join pers001p e on (e.cedpol=a.nrodoc)  left join fallecido f on  
  f.cedula=a.nrodoc WHERE a.nrodoc='$nrodocu'";
  
//echo ("<iframe src='http://172.16.0.20/id_consultas/ver_foto_pn.php?cedula=$nrodoc115&tipo=2' width='170' //height='250' frameborder='0' scrolling='no' target='_blank'></iframe>") ;
	
	
$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
$datos= array();

  if (PEAR::isError($mdb2)) {  mostrarError($mdb2); die($mdb2->getMessage());
  }else{
  $mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC );
 $res=&  $mdb2->query(  $sql );
 
 if (PEAR::isError($res)) {  mostrarError($res); die($mdb2->getMessage());
  }else{ 
    $datos= $res->fetchAll();
    
    
  }/** Consulta exitosa **/
    
  }/** Conexion exitosa ***/
  return $datos;
}




function campoJudicial($nrocedula){
    
$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');
$datos= array();

  if (PEAR::isError($mdb2)) {  mostrarError($mdb2); die($mdb2->getMessage());
  }else{
  $sql_ca="select trae_esta('$nrocedula')";
	 $rs_ca = $mdb2->query($sql_ca);
     if (PEAR::isError($rs_ca)) {
          mostrarError( $rs_ca);
        die($rs_ca->getMessage());
     }else{
        $row_ca=$rs_ca->fetchRow(MDB2_FETCHMODE_ASSOC);
	$situ_captu=$row_ca['trae_esta'];
    $ante_desc="";
	if ($situ_captu=='TIENE PROBLEMA JUDICIAL'){
       $ante_desc='Debe registrar la situacion(Consulta o Detencion), caso contrario el Sistema asumira que la persona por la cual consulta se encuentra DETENIDA...';
	   //  boton 
   }
   $datos= array("titulo"=> $situ_captu,  "descri"=> $ante_desc);
     } /** consulta exitosa**/
  }/** conexion exitosa **/
  
  return $datos;
   
}




?>