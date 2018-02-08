<?php
require_once 'MDB2.php';

  //Conectar
  //$mdb2 =& MDB2::connect('pgsql://postgres:postgres@localhost/trabajo');
 $mdb =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');

  if (PEAR::isError($mdb)) {
      die($mdb->getMessage());
  }else{
	  
	  //echo  "Conexion exitosa a -- trabajo ";
  }
  

$sql_pr=  "select a.tipodoc,a.nrodoc,a.nropro,a.nombre,a.apellido,a.fechanac,b.descrip as nac_desc,
  c.descrip as nacio_orig,a.lugnac, a.sexo,a.estado_civil,d.descripcion as profesion,a.domicilio,a.barrio_ciudad, 
  a.telefono,a.celular,a.padre_cedul,a.padre_nombre, a.padre_apelli,a.madre_cedul,a.madre_nombre,a.madre_apelli,
  a.conyu_cedul,a.conyu_nombre,a.conyu_apelli, a.ubicacion,a.fechaimp, a.fech_activa,a.fech_vencim,a.donante_org,
  a.orig_datos,a.fechagra,a.usuario,e.cedpol,e.estado,e.motibaja,age(fechanac) as edad50  from personas a 
  left join nacio b on (b.idnacio=a.nacio) left join nacio c on (c.idnacio=a.nacio_orig) left join profesiones d on 
  (d.idprofesiones=a.profesion) left join pers001p e on (e.cedpol=a.nrodoc)  left join fallecido f on  
  f.cedula=a.nrodoc WHERE a.nrodoc='".$a."'";
  

$nroci= $nom = $ape=  $cedula_poli= $inactivo=  $estado= null;
 $mdb->setFetchMode( MDB2_FETCHMODE_ASSOC);
$resultadopr=& $mdb->query($sql_pr); 

if(PEAR::isError($resultadopr)){ die( $resultadopr->getMessage());  }

$resultadopr->bindColumn('nrodoc', $nroci);
$resultadopr->bindColumn('nombre', $nom);
$resultadopr->bindColumn('apellido', $ape);
$resultadopr->bindColumn('estado', $estado); /** Estado como oficial policial **/
$resultadopr->bindColumn('cedpol', $cedula_poli ); /** Si fuera policia ***/
$resultadopr->bindColumn('motibaja', $inactivo); /** En caso de ser policia, motivo de su baja **/

//echo "Resultados PAnel 1 ". $resultado->numRows() . "  ".$sql;



 if( $resultadopr->fetchRow() ){
    
	// Verifico si es Personal Policial
		if(!empty( $cedula_poli )){
		    if($estado=='ACTIVO'){
          	      $cedula_poli='ES PERSONAL POLICIAL';
                  
		    }elseif ($estado=='INACTIVO'){
		      
		        if ($inactivo=='BAJA'){
		             $cedula_poli='PERSONAL POLICIAL DADO DE BAJA';
                     
			    }elseif ($inactivo=='PASE A RETIRO'){
				     $cedula_poli='PERSONAL POLICIAL EN SITUACION DE RETIRO';
				}
			}
        }else{ $cedula_poli=" NO ES PERSONAL POLICIAL"; }
      
      
     /*** Problema Judicial **/ 
     $sql_ca="select trae_esta('$nroci')";
   
	 $rs_ca = $mdb2->query($sql_ca);
     if (PEAR::isError($rs_ca)) {
        die($rs_ca->getMessage());
     } 
  
	$row_ca=$rs_ca->fetchRow(MDB2_FETCHMODE_ASSOC);
	$situ_captu=$row_ca['trae_esta'];
    $ante_desc="";
	if ($situ_captu=='TIENE PROBLEMA JUDICIAL'){
       $ante_desc='Debe registrar la situacion(Consulta o Detencion), caso contrario el Sistema asumira que la persona por la cual consulta se encuentra DETENIDA...';
   }
   
   
   
      
?>





<div class="panel-success"> 
<?php  
//echo ("<iframe class='fotografia' src='http://172.16.0.20/id_consultas/ver_foto_pn.php?cedula=$nroci&tipo=1' width='170' height='250' ></iframe>");  
//echo ("<img class='fotografia' src='http://172.16.0.20/id_consultas/ver_foto_pn.php?cedula=$nroci&tipo=1' width='170' height='250' frameborder='0' scrolling='no' target='_blank'>");  ?>

<b class="subt">Nro.Docu.:</b>&nbsp;<span> <?= $nroci ?></span>&nbsp;<span><?= $nom ?></span>&nbsp;<span><?= $ape ?></span>
<b class="subt"><?= $situ_captu?></b><span><?= $ante_desc ?></span>
<b class="subt"><?= $cedula_poli?></b>
</div>






<?php 

} 
$mdb->disconnect();
//$resultado->free();

?>