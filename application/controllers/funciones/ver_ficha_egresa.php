<?php
error_reporting(0);
session_start();


if($_SESSION['autoriconsu']!=1){
	header("Location: logout.php");
	exit();
}
$depen_usua=$_SESSION['depend'];
$usua      =$_SESSION['usr'];
/////////////////////////////////////////////////////////////
include("cone_armas.php");

$codi  =$_REQUEST['codi'];


//////------------- consulta pa la fichade portadores
$sql_pol= "select * from policias where nrodoc='$codi'";
$res_pol = $mdb2->query($sql_pol);
   if (PEAR::isError($res_pol)){
   	  die($res_pol->getMessage());
}
$rpol=$res_pol->fetchRow(MDB2_FETCHMODE_ASSOC);
$cedu	=$rpol['nrodoc'];


if($cedu!=$codi){
?>
	<script language="javascript">
		alert('ESTE PERSONA NO ES PERSONAL POLICIAL !');
	    window.history.back();
	</script>
<?php
}else{

//////------------- consulta pa la fichade portadores
$sql= "select por.nrodoc, pro.descripcion as profesion,  por.tipodoc, nacio.descrip as nacio, por.usuario, por.fecha_ing, por.decreto_nro,
 por.fechagrab, por.servi_porta, por.otro_doc, por.nombre, por.apellido, por.fechanac, por.lugnac, por.domicilio, por.estado, por.motivo,
por.barrio_ciudad, por.telefono, por.celular, per.descri4 as lug_servi, por.promocion, por.credpol, gra.descrip as grado_actual, por.motibaja,
por.antigue, por.fecha_baja
from policias por
left join pers002p per on por.lug_servi=per.codigo
left join grado gra on por.grado_actual=gra.id
left join nacio on por.nacio=nacio.idnacio
left join profesiones pro on por.profesion=pro.idprofesiones
where nrodoc='$codi'";
$res = $mdb2->query($sql);
   if (PEAR::isError($res)){
   	  die($res->getMessage());
}
$row=$res->fetchRow(MDB2_FETCHMODE_ASSOC);
$tipodoc	=$row['tipodoc'];
$nrodoc		=$row['nrodoc'];

$nombre		=$row['nombre'];
$apellido	=$row['apellido'];
$fechanac	=$row['fechanac'];
$lugnac		=$row['lugnac'];

$domicilio		=$row['domicilio'];
$barrio_ciudad	=$row['barrio_ciudad'];
$telefono		=$row['telefono'];
$celular		=$row['celular'];
$nacio			=$row['nacio'];
$profesion		=$row['profesion'];
$credpol		=$row['credpol'];
$servi_porta	=$row['servi_porta'];
$lug_servi		=$row['lug_servi'];
$estado_pol		=$row['estado'];

$fechaing		=$row['fecha_ing'];
$decreto_nro	=$row['decreto_nro'];
$grado_actual	=$row['grado_actual'];
$promocion		=$row['promocion'];
$motibaja		=$row['motibaja'];
$motivo			=$row['motivo'];
$antiguedad		=$row['antigue'];
$fechabaja  	=$row['fecha_baja'];


if($lug_servi=='SIN DESTINO A ENTREGAR'){
$destino='';
}else{
$destino=$lug_servi;
}



	if (($fechabaja=='1777-07-07')or ($fechabaja=='')){
		$fecha_baja='';
	}else{
		$fecha_baja=date("d-m-Y",strtotime($fechabaja)); 
	}


	if (($fechaing=='1777-07-07')or ($fechaing=='')){
		$fecha_ing='';
	}else{
		$fecha_ing=date("d-m-Y",strtotime($fechaing)); 
	}


/////////********************************************************************
//$sql_gra= "select * from persbaja where cedpol='$nroced' ";
//$res_grado = $mdb2->query($sql_gra);
//if (PEAR::isError($res_grado)){
//	  die($res_grado->getMessage());
//}
//$rg=$res_grado->fetchRow(MDB2_FETCHMODE_ASSOC);
//$estado=$rg['estado'];
//$motivo2=$rg['motivo'];
//$motibaja2=$rg['motibaja'];

/////////////////////////////////////////////////////
$sql_g= "select per.descri4 as depen_usua, por.usuario, por.fechagrab, per.descri4 as depen_usua
from policias por
left join pers002p per on por.depen_usua=per.codigo
where nrodoc='$codi'";
$res_gra = $mdb2->query($sql_g);
  if (PEAR::isError($res_gra)){
 	  die($res_gra->getMessage());
}
$rgra=$res_gra->fetchRow(MDB2_FETCHMODE_ASSOC);
$usuario    =$rgra['usuario'];
$depen_usua =$rgra['depen_usua'];
$fechagrab  =$rgra['fechagrab'];


///////////////////////------onsulta para las armas
$sql_movi = "select  tra.id_por, tra.nrodoc, tra.id_arma, tra.serie_nro, ar.tipo_arma, ar.tipo_uso, 
 ar.calibre, ar.marca, nacio.descrip as procede, ar.situacion
from transfe tra
left join armas ar left join nacio on ar.procedencia=nacio.idnacio 
								on tra.id_arma=ar.id_arma
where tra.nrodoc='$codi' 
order by ar.tipo_arma, ar.serie_nro";
$movi = $mdb2->query($sql_movi);

$mdb2->disconnect(); 

////////////consulta a moviestado para ver mensajes de antecedentes
include("cone_trabajo.php");
$codi=$_REQUEST['codi'];


//
//$sql_men= "select mov.id, mov.nroced, mov.est_jud, mov.situ, mov.tipo_esta, es.descrip2
//from moviestado mov
//left join est_judi es on mov.est_jud=es.estado
//where nroced='$codi' ";
//$res_men = $mdb2->query($sql_men);
//   if (PEAR::isError($res_men)){
//   	  die($res_men->getMessage());
//}
//$men=$res_men->fetchRow(MDB2_FETCHMODE_ASSOC);
//$tipo_esta=$men['tipo_esta'];
//$estado=$men['descrip2'];
//$situ=$men['situ'];
//
//
//if (($tipo_esta==8) and ($situ!='A') and ($situ!='E') and ($situ!='H') and ($situ!='N') and ($situ!='P') and ($situ!='S')){
//	$tipo='POSEE ANTECEDENTES PENDIENTES';
//}else{
//	$tipo='ANTECEDENTES SOLUCIONADOS';
//}
//
//if (($tipo_esta!=8) and ($tipo_esta!=1) and ($tipo_esta!=2) and ($tipo_esta!=3) and ($tipo_esta!=4) and ($tipo_esta!=5)){
//	$tipo='NINGUNA';
//}else{
//		if($tipo_esta==1){
//		$tipo='MEDIDAS JUDICIALES PENDIENTES';
//
//		}
//		if($tipo_esta==2){
//		$tipo='MEDIDAS CAUTELARES PENDIENTES';
//		}
//		if($tipo_esta==3){
//		$tipo='PROHIBICIONES PENDIENTES';
//		}
//		if($tipo_esta==4){
//		$tipo='PROHIBICION SALIR DEL PAIS';
//		}
//		if($tipo_esta==5){
//		$tipo='MEDIDAS ALTERNATIVAS PENDIENTES';
//		}
//}

$sql_carcel = "select * from espenitencia.espe_movimiento where nrodoc='$codi' order by fecha_ent";
$peni = $mdb2->query($sql_carcel);

$sql_captu = "select * from cap001 where cidcap='$codi' order by fecnota";
$captu = $mdb2->query($sql_captu);

$sql_novedad = "select * from novedad.novedad where ci_denu='$codi' order by fch_info";
$nove = $mdb2->query($sql_novedad);


$mdb2->disconnect();

///////////////////////////////////////////////////////////////////////////////////////////////////
// include("cone_ip.php");
// 
//$codi=$_REQUEST['codi'];
//$nroced=$_REQUEST['nroced'];
//
//$sql_ip = "select * from vista_triple where identidad='$nroced'";
//$inter = $mdb2->query($sql_ip);
//	  
//$mdb2->disconnect(); 

 ///////////////////////////////////////////////////////////////////////////////////////////////////
 include("cone_auto.php");
 
 
$codi   =$_REQUEST['codi'];
$nroced =$_REQUEST['nroced'];

$sql_auto = "select * from vehiculos.vista_auto_clide where cedula='$codi'";
$auto = $mdb2->query($sql_auto);

	  
$mdb2->disconnect();


 include("cone_denu.php");
///////////////////////////////////////////////////////////
      $sql_resto="SELECT ap.nrodoc, ac.id_acta, ac.nro_acta, ac.fecha_acta, ac.tipo_acta, ac.sobre, ac.depen_poli,
	  per.descri4 as depen_poli, ar.tipo_arma, ar.serie_nro, ar.marca, ar.calibre
	  FROM acta_perso ap
	  left join actas ac  left join acta_arma ar on ac.id_acta=ar.id_doc
	  			on ap.id_doc=ac.id_acta
	  left JOIN pers002p per ON ac.depen_poli=per.codigo
	  WHERE ac.nrodoc='$nrodoc'";
      $resto = $mdb2->query($sql_resto);
	  
	  
	  
$mdb2->disconnect();

}/// cierre del else del if nrodoc
?>

<html>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
body {
	background-color: #FFFFFF;
}
.style19 {
	font-size: 18px;
	color: #000000;
}
.style82 {font-size: 12px; font-weight: bold; }
.style87 {font-size: 14px; font-weight: bold; }
.style88 {
	color: #FFFFFF;
	font-size: 11px;
}
.style93 {
	color: #FFFFFF;
	font-size: 10px;
	font-style: italic;
}
.style97 {font-size: 11px; font-weight: bold; }
.style98 {font-size: 11px}
.style100 {color: #000000}
.style105 {
	font-size: 12px;
	font-weight: bold;
	color: #000000;
}
.style112 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.style113 {
	font-size: 10px;
	font-weight: bold;
}
.style114 {font-size: 12px}
.style116 {color: #FF0000}
.style117 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FF0000; }
.style118 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style119 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style120 {font-family: Arial, Helvetica, sans-serif; }
-->
</style>



						
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<table width="930" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
<td width="302" height="26" bordercolor="#CCCCCC" bgcolor="#999999" >
<span class="style93 style100">
<?=$usuario?> <?php echo " " ?> <?=$fechagrab?> 
<BR>
<?=$depen_usua?></span></td>

<td width="421" bordercolor="#CCCCCC" bgcolor="#999999"><div align="left" class="style19 style100">FICHA DEL PERSONAL POLICIAL </div></td>
<td width="200" bordercolor="#CCCCCC" bgcolor="#999999"><div align="right"><a href="http://172.16.0.30/consultas/main.php" TITLE="SALIR" target="_top"><img src="imagenes/clicknrun.png" alt="salir" width="33" height="32" TITLE="SALIR" border="0"></a><BR>
  <span class="style113">Salir</span></div></td>
  </tr>
<tr>
<td height="345" colspan="3" bgcolor="#EAEAEA">
<form name="form1" action="ver_ficha_egresa.php" method="post">
<input type="hidden" name="usuario" value="<?=$usuario?>"/>
<input type="hidden" name="depen_usua" value="<?=$depen_usua?>"/>
<input type="hidden" name="fechagrab" value="<?=$fechagrab?>"/>



<table width="930" align="center" bordercolor="#EAEAEA" bgcolor="#EAEAEA">
            <tr >
              <td width="176" rowspan="13" align="left" valign="middle" >
               <div  align="left"><? 
					   $nrodoc_cant=strlen($codi);
					  
					   if ($nrodoc_cant == 6){
					     $nrodoc115='0'.$codi;
					   }
					   if ($nrodoc_cant == 5){
					     $nrodoc115='00'.$codi;
					   }
					   if ($nrodoc_cant == 4){
					     $nrodoc115='000'.$codi;
					   }
					   if ($nrodoc_cant > 6){
					     $nrodoc115=$codi;
					   }
					   
					   echo ("<iframe src='http://172.16.0.20/id_consultas/ver_foto_pn.php?cedula=$nrodoc115&tipo=1' width='170' height='250' frameborder='0' scrolling='no' target='_blank'></iframe>") ?></div> </td>
              <td height="22" colspan="6" align="left" valign="middle" bgcolor="#CCCCCC" ><div align="center" class="style87">
                <div align="left">&gt;&gt; Datos Personales</div>
              </div></td>
            </tr>
          <tr >
  <td width="157" height="22" align="left" valign="middle" bgcolor="#EAEAEA" ><div align="left" class="style97">
    <div align="left">TIPO DOC. :</div>
  </div></td>
<td width="148" valign="middle" bgcolor="#FFFFFF" ><span class="style98"><?=$tipodoc?></span></td>
<td colspan="2" valign="middle" bgcolor="#FFFFFF" ><span class="style82"> Nº</span> <span class="style82">
<?=$nrodoc?></span></td>
<td width="92" valign="middle" bgcolor="#EAEAEA" ><div align="right" class="style98">
  <div align="left"><strong>FECHA NAC.  :</strong></div>
</div></td>
<td width="168" valign="middle" bgcolor="#FFFFFF" ><span class="style98"><?php echo date("d-m-Y", strtotime($fechanac)) ?></span></td>
</tr>
<tr>
  <td height="20" align="left" valign="middle" bgcolor="#EAEAEA" ><div align="left" class="style98">
    <div align="left"><strong>NOMBRE/APELLIDO :</strong></div>
  </div></td>
  <td height="20" colspan="5" valign="middle" bgcolor="#FFFFFF" ><span class="style98">
   <?=$grado_actual?>
  </span><span class="style87 style98"> <?=$nombre?>&nbsp;&nbsp;<?=$apellido?></span>    <div align="right" class="style98"></div></td>
  <tr>
    <td height="21" valign="middle" bgcolor="#EAEAEA" ><div align="left" class="style98">
      <div align="left"><strong>NACIONALIDAD:</strong></div>
    </div></td>
    <td colspan="3" bgcolor="#FFFFFF" ><span class="style98"><?=$nacio?></span></td>
    <td bgcolor="#EAEAEA" ><div align="right" class="style98">
      <div align="left"><strong>LUGAR NAC.</strong>:</div>
    </div></td>
    <td bgcolor="#FFFFFF" ><span class="style98"><?=$lugnac?></span></td>
    <tr>
      <td height="20" valign="middle" bgcolor="#EAEAEA" ><div align="left" class="style98">
        <div align="left"><strong>PROFESIÓN  :</strong></div>
      </div></td>
      <td colspan="3" valign="middle" bgcolor="#FFFFFF" ><span class="style98"><?=$profesion?></span> </td>
      <td height="20" valign="middle" bgcolor="#EAEAEA" >&nbsp;</td>
      <td valign="middle" bgcolor="#FFFFFF" >&nbsp;</td>
    <tr>
    <td height="27" align="left" valign="middle" bgcolor="#EAEAEA" ><div align="left" class="style98">
      <div align="left"><strong>DOMICILIO:</strong></div>
    </div></td>
    <td colspan="5" bgcolor="#FFFFFF" ><span class="style98">
      <?=$domicilio?>
      <BR>
      <strong>Bº - CIUDAD </strong>:<?=$barrio_ciudad?></span></td>
    <tr>
      <td height="20" valign="middle" bgcolor="#EAEAEA" ><div align="left" class="style98">
        <div align="left"><strong>TELEFONO  :</strong></div>
      </div></td>
      <td colspan="3" valign="middle" bgcolor="#FFFFFF" ><span class="style98"><?=$telefono?>&nbsp;&nbsp;</span></td>
      <td width="92" valign="middle" bgcolor="#EAEAEA" ><div align="left"><span class="style82 style98">CELULAR:</span></div></td>
      <td valign="middle" bgcolor="#FFFFFF" ><span class="style98"><?=$celular?></span></td>
      <tr>
        <td height="31" colspan="6" valign="middle" bgcolor="#CCCCCC" ><div align="center" class="style87">
          <div align="left">&gt;&gt;Datos Laborales</div>
        </div></td>
        <tr>
        <td height="26" valign="middle" bgcolor="#EAEAEA" ><div align="left" class="style98">
          <div align="left"><strong>DESTINO  :</strong></div>
        </div></td>
        <td height="26" colspan="5" valign="middle" bgcolor="#FFFFFF" ><span class="style98">
		<?=$destino?></span></td>
        <tr>
          <td height="25" valign="middle" ><div align="left" class="style98">
              <div align="left"><strong>OTROS DATOS   :</strong></div>
          </div></td>
          <td colspan="3" valign="middle" bgcolor="#FFFFFF" ><span class="style98"><strong>CREDENCIAL</strong>:
            <?=$credpol?>
            <strong>PROMOCIÓN</strong>:    <?=$promocion?>

          </span></td>
          <td height="25" valign="middle" ><div align="left" class="style98">
              <div align="left"><strong>ESTADO :</strong></div>
          </div></td>
          <td valign="middle" bgcolor="#FFFFFF" ><span class="style98"> <?=$servi_porta?> <?=$estado_pol?></span></td>
          <tr>
            <td height="32" valign="middle" ><div align="left" class="style98">
                <div align="left"><strong>FECHA/INGRESO   :</strong></div>
            </div></td>
            <td colspan="3" valign="middle" bgcolor="#FFFFFF" ><span class="style98">
              <?=$fecha_ing?> 
              <strong>DTO.N°</strong> 
              <?=$decreto_nro?>
            </span></td>
            <td height="32" valign="middle" ><div align="left"><span class="style82 style98">ANTIGUEDAD</span>:</div></td>
            <td valign="middle" bgcolor="#FFFFFF" ><span class="style98">
              <?=$antiguedad?>
            años</span></td>
          <tr>
            <td height="20" valign="middle" ><div align="left" class="style98">
                <div align="left"><strong>FECHA/.BAJA   :</strong></div>
            </div></td>
            <td height="20" colspan="5" valign="middle" bgcolor="#FFFFFF" ><span class="style98">
              <?=$fecha_baja?> 
              <strong>DTO.N°</strong> 
              <?=$decreto_baja?>
            </span><span class="style82">MOTIVO</span>:<span class="style98">
              <?=$motivo?>
            </span>- <span class="style98">
            <?=$motibaja?>
            </span></td>
          <tr >
        <td height="20" bordercolor="#000000" >&nbsp;</td>
    <td colspan="5" bordercolor="#000000" >&nbsp;</td>
        </tr>
</table>
</form></td>
  </tr>
</table>

<?php
//if($movi){	desde aqui
$rowcont=$movi->numRows();
if ($rowcont > 0){
?>
<form action="" method="post" enctype="multipart/form-data" name="form5" id="form5">

<input type="hidden" name="codi" value="<?=$codi?>"/>

<table width="930" align="center">
<tr>
<td height="34" colspan="9" bgcolor="#999999" ><div align="center" class="style88 style100">
  <div align="center" class="style105">
    <div align="left">&gt;&gt; ARMAS </div>
  </div>
</div></td>
</tr>
<tr>
      <td width="109" bgcolor="#CCCCCC"><div align="center" class="style98"><strong>TIPO </strong></div></td>
      <td width="84" bgcolor="#CCCCCC"><div align="center" class="style98"><strong>CALIBRE</strong></div></td>
      <td width="117" bgcolor="#CCCCCC"><div align="center" class="style98"><strong>SERIE N° </strong></div></td>
      <td width="127" bgcolor="#CCCCCC"><div align="center" class="style98"><strong>MARCA</strong></div></td>
      <td width="156" bgcolor="#CCCCCC"><div align="center" class="style98"><strong>PROCEDENCIA</strong></div></td>
      <td width="179" bgcolor="#CCCCCC"><div align="center" class="style98"><strong>TIPO/USO</strong></div></td>
	  <td width="126" bgcolor="#CCCCCC"><div align="center" class="style98"><strong>DENUNCIA </strong></div></td>
    </tr>
<?php

	while($fila = $movi->fetchRow(MDB2_FETCHMODE_ASSOC)){ 
	$situa      =$fila['situacion'];
	
	if($situa=='NINGUNA'){
	$situacion='';
	}else{
	$situacion=$situa;
	} 
	 
	?>
	<tr>
<td height="20" bgcolor="#EAEAEA"><span class="style112 style118 style114"><span class="style120"><?php echo $fila['tipo_arma']?></span></span></td>
<td bgcolor="#EAEAEA"><span class="style112 style118 style114"><span class="style120"><?php echo $fila['calibre']?></span></span></td>
<td bgcolor="#EAEAEA">
  
  <a href = "ver_ficha_arma5.php?codi=<?=$codi?>&nroced=<?=$codi?>&id_arma=<?php echo $fila["id_arma"] ?>&serie_nro=<?php echo $fila['serie_nro']?>" title="FICHA DEL ARMA" class="style112 style118 style114"><?php echo $fila['serie_nro']?></a></td>

<td bgcolor="#EAEAEA"><span class="style112 style118 style114"><span class="style120"><?php echo $fila['marca']?></span></span></td>
<td bgcolor="#EAEAEA"><span class="style112 style118 style114"><span class="style120"><?php echo $fila['procede']?></span></span></td>
<td bgcolor="#EAEAEA"><span class="style112 style118 style114"><span class="style120"><?php echo $fila['tipo_uso']?></span></span></td>
<td bgcolor="#EAEAEA"><span class="style117 style118"><span class="style120"><blink><?=$situacion?></blink></span></span></td>
</tr>
	<?php
	}//cierra el while
	?>
</table>
</form>
  <?php
	}else{//cierra el if ($res)
	}
	?>


<?php
$rowcont=$captu->numRows();
if ($rowcont > 0){
?>
<form action="" method="post" enctype="multipart/form-data" name="form5" id="form5">

<table width="930" align="center">
<tr>
<td height="22" colspan="9" bgcolor="#999999" ><div align="center" class="style97">
  <div align="left"><span class="style4">
    &gt;&gt; ANTECEDENTES </span>PENALES</div>
</div></td>
</tr>
<tr>
      <td width="26" bgcolor="#CCCCCC"><span class="style98 style137"><strong>N° </strong></span></td>
      <td width="290" bgcolor="#CCCCCC"><span class="style98 style137"><strong>CAUSA</strong></span></td>
      <td width="130" bgcolor="#CCCCCC"><span class="style98 style137"><strong>N° / FECHA OFICIO </strong></span></td>
       <td width="262" bgcolor="#CCCCCC"><span class="style98 style137"><strong>JUEZ-SECRETARIA</strong></span></td>
      <td width="198" bgcolor="#CCCCCC"><span class="style98 style137"><strong>MEDIDAS</strong></span></td>
    </tr>
<?php

	while($ca = $captu->fetchRow(MDB2_FETCHMODE_ASSOC)){ 
	$fecnota=$ca['fecnota'];
	 

	?>
	<tr>
<td height="38" bgcolor="#FFFFFF"><span class="style143 style98"><?php echo $ca['orden']?></span></td>
<td bgcolor="#FFFFFF"><span class="style143 style98"><?php echo $ca['causa']?></span></td>
<td bgcolor="#FFFFFF"><span class="style143 style98"><?php echo $ca['nronota']?>&nbsp;&nbsp; <?php echo date("d/m/Y", strtotime($fecnota)) ?></span> <span class="style98"><br />
    <?php echo $ca['circun']?></span></td>
<td bgcolor="#FFFFFF"><span class="style124 style98"><?php echo $ca['juez']?><br /><?php echo $ca['secreta']?></span></td>
<td bgcolor="#FFFFFF"><span class="style124 style98"><?php echo $ca['observa2']?></span></td>
</tr>
	<?php
	}//cierra el while
	?>
</table>
</form>
  <?php
	}else{//cierra el if ($res)
	}
	?>

	
<?php
//if($movi){	desde aqui
$rowcont=$peni->numRows();
if ($rowcont > 0){
?>
<form action="" method="post" enctype="multipart/form-data" name="form4" id="form4">

<table width="930" align="center">
<tr>
<td height="22" colspan="8" bgcolor="#999999" ><div align="center" class="style97">
  <div align="left"><span class="style7">&gt;&gt; ENTRADA - SALIDA DE PENITENCIARIAS</span></div>
</div></td>
</tr>
<tr>
      <td width="87" bgcolor="#CCCCCC"><span class="style98 style137"><strong>TIPO MOVI. </strong></span></td>
      <td width="90" bgcolor="#CCCCCC"><span class="style98 style137"><strong>FECHA</strong></span></td>
      <td width="270" bgcolor="#CCCCCC"><span class="style98 style137"><strong>LUGAR</strong></span></td>
      <td width="159" bgcolor="#CCCCCC"><span class="style98 style137"><strong>ESTADO</strong></span></td>
      <td width="300" bgcolor="#CCCCCC"><span class="style98 style137"><strong>CAUSA</strong></span></td>
    </tr>
<?php
	while($car = $peni->fetchRow(MDB2_FETCHMODE_ASSOC)){
	$tipomov=$car['tipo_mov'];
	$esta=$car['estado'];
	$fechamov=$car['fecha_mov'];
	$fechaent=$car['fecha_ent'];
	$fechasal=$car['fecha_sal'];
	
	if (($fechaent=='1777-07-07')and ($fechasal=='1777-07-07')){
		$fecha_ent='';
		$fecha_sal='';
		$entrada='';
		$salida='';
	}
	
	if (($fechaent!='1777-07-07')and ($fechasal=='1777-07-07')){
		$fecha_ent=date("d-m-Y",strtotime($fechaent)); 
		$fecha_sal='';
		$entrada='ENTRADA';
	}

	if (($fechaent!='1777-07-07')and ($fechasal!='1777-07-07')){
		$fecha_ent=date("d-m-Y",strtotime($fechaent));
		$fecha_sal=date("d-m-Y",strtotime($fechasal)); 
		$salida='SALIDA';
		$entrada='ENTRADA';
	}

	if (($fechaent=='1777-07-07')and ($fechasal!='1777-07-07')){
		$fecha_ent='';
		$fecha_sal=date("d-m-Y",strtotime($fechasal)); 
		$salida='SALIDA';
		$entrada='';
	}

///////////****************************************************
	if (($fechamov=='1777-07-07')or ($fechamov=='')){
		$fecha_mov='';
	}else{
		$fecha_mov=date("d-m-Y",strtotime($fechamov)); 
	}

	if($esta=='Recluido'){
	$estado='RECLUIDO';
	}
	if($esta=='lib_medi'){
	$estado='LIBERTAD C/MEDIDAS';
	}
	if($esta=='Libertad'){
	$estado='LIBERTAD';
	}
	
if($tipomov=='traslado'){ 
$mov='TRASLADADO';
}
if($tipomov=='Comparecencia'){ 
$mov='COMPARECENCIA';
}

	?>
	<tr>
<td height="20" bgcolor="#EAEAEA"><span class="style8 style114"><?=$entrada?><br />
  <?=$salida?></span></td>
<td bgcolor="#EAEAEA"><span class="style8 style114"><?=$fecha_ent?> <?=$fecha_sal?></span></td>
<td bgcolor="#EAEAEA">
  <span class="style8 style114"><?php echo $car['l_reclu']?></span></td>
<td bgcolor="#EAEAEA"><span class="style10 style114 style116"><blink><?=$estado?> </blink><BR />
  <?=$mov?> <?=$fecha_mov?>
</span></td>
<td bgcolor="#EAEAEA"><span class="style8 style114"><?php echo $car['causa']?></span></td>
</tr>
	<?php
	}//cierra el while
	?>
</table>
</form>
  <?php
	}else{//cierra el if ($res)
	}
	?>	
	
	
	<?php
//if($movi){	desde aqui
$rowcont=$auto->numRows();
if ($rowcont > 0){
?>
<form action="" method="post" enctype="multipart/form-data" name="form3" id="form3">

<table width="930" align="center">
<tr>
<td height="27" colspan="9" bgcolor="#999999" ><div align="center" class="style82">
  <div align="left"><span class="style4">&gt;&gt; VEHICULOS DENUNCIADOS</span></div>
</div></td>
</tr>
<tr>
      <td width="131" height="19" bgcolor="#CCCCCC"><span class="style114 style137"><strong>TIPO </strong></span></td>
      <td width="103" bgcolor="#CCCCCC"><span class="style114 style137"><strong>MARCA</strong></span></td>
      <td width="136" bgcolor="#CCCCCC"><span class="style114 style137"><strong>MODELO</strong></span></td>
      <td width="109" bgcolor="#CCCCCC"><span class="style114 style137"><strong>CHAPA</strong></span></td>
      <td width="89" bgcolor="#CCCCCC"><span class="style114 style137"><strong>SITUACION</strong></span></td>
      <td width="78" bgcolor="#CCCCCC"><span class="style114 style137"><strong>TIPO/ROBO</strong></span></td>
	  <td width="89" bgcolor="#CCCCCC"><span class="style114 style137"><strong>FECHAROBO</strong></span></td>
      <td width="274" bgcolor="#CCCCCC"><span class="style114 style137"><strong>DEPENDENCIA</strong></span></td>
    </tr>
<?php

	while($vehi = $auto->fetchRow(MDB2_FETCHMODE_ASSOC)){
	$fecharobo=$vehi['fecharobo'];
	$situacion=$vehi['situacion'];
	if($situacion=='D'){
	$situa='DENUNCIADO';
	}

	?>
	<tr>
<td height="20" bgcolor="#FFFFFF"><span class="style8 style118 style98"><?php echo $vehi['tipoauto']?></span></td>
<td bgcolor="#FFFFFF"><span class="style8 style118 style98"><?php echo $vehi['marca']?></span></td>
<td bgcolor="#FFFFFF">
  <span class="style8 style118 style98"><?php echo $vehi['modelo']?></span></td>

<td bgcolor="#FFFFFF"><span class="style8 style118 style98"><?php echo $vehi['nrochapa']?></span></td>
<td bgcolor="#FFFFFF"><span class="style10 style118 style98 style116"><blink>
  </blink></span><span class="style124 style118 style98 style116"><strong><blink></blink></strong><blink></blink><blink></blink></span><span class="style119 style116"><blink></blink><blink></blink><blink></blink><blink></blink></span><span class="style98 style116"><blink></blink><blink></blink></span><span class="style116"><blink></blink></span><blink><div align="center" class="style10 style118 style98 style116">
    <?=$situa?>
  </div>
</blink></td>
<td bgcolor="#FFFFFF"><span class="style8 style118 style98"><?php echo $vehi['tiporobo']?></span></td>
<td bgcolor="#FFFFFF"><span class="style8 style118 style98"><?php echo date("d/m/Y", strtotime($fecharobo)) ?></span></td>
<td bgcolor="#FFFFFF"><span class="style8 style118 style98"><?php echo $vehi['depen']?></span></td>
</tr>
	<?php
	}//cierra el while
	?>
</table>
</form>
  <?php
	}else{//cierra el if ($res)
	}
	?>
  <?php
$rowcont=$resto->numRows();
if ($rowcont > 0){
?>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

<table width="930" align="center">
<tr>
<td height="26" colspan="9" bgcolor="#999999" ><div align="center" class="style82">
  <div align="left"><span class="style4">
    &gt;&gt; DENUNCIAS </span></div>
</div></td>
</tr>
<tr>
      <td width="42" bgcolor="#CCCCCC"><span class="style114 style137"><strong>N° </strong></span></td>
      <td width="100" bgcolor="#CCCCCC"><span class="style114 style137"><strong>FECHA</strong></span></td>
      <td width="165" bgcolor="#CCCCCC"><span class="style114 style137"><strong>TIPO ACTA </strong></span></td>
      <td width="279" bgcolor="#CCCCCC"><span class="style114 style137"><strong>DETALLE</strong></span></td>
      <td width="320" bgcolor="#CCCCCC"><span class="style114 style137"><strong>DEPENDENCIA</strong></span></td>
    </tr>
<?php

	while($filo = $resto->fetchRow(MDB2_FETCHMODE_ASSOC)){ 
	$fecha_acta =$filo['fecha_acta'];
	$id_acta    =$filo['id_acta'];
	$tipo_acta  =$filo['tipo_acta'];
	$nro_acta   =$filo['nro_acta'];
	
	
	
	$sql_objeto = "select * from acta_arma where id_doc=$id_arma";
    $objeto = $mdb2->query($sql_objeto);
	
	
	
	?>
	<tr>
	
<td height="20" bgcolor="#FFFFFF"><div align="center"><span class="style143 style118 style114">
  
  <a href = "print_denu_objeto.php?id_acta=<?=$id_acta?>" ><?php echo $filo['nro_acta']?></a>
  
  
</span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="style143 style118 style114"><?php echo date("d/m/Y", strtotime($fecha_acta)) ?></span></div></td>
<td bgcolor="#FFFFFF"><span class="style143 style118 style114"> <?php echo $filo['tipo_acta']?> <?php echo $filo['tipo_acta']?> </span></td>
<td bgcolor="#FFFFFF"><span class="style143 style118 style114">

<?php
$rowcont=$objeto->numRows();
if ($rowcont > 0){
while($ob= $objeto->fetchRow(MDB2_FETCHMODE_ASSOC)){ 
?>
- <?php echo $ob['tipo_arma']?> <?php echo $ob['marca']?> <?php echo $ob['modelo']?>  <?php echo $ob['serie_nro']?> <?php echo $ob['calibre']?><br>
<?php
}
}  
?>



</td>



<td bgcolor="#FFFFFF"><span class="style143 style118 style114"><?php echo $filo['depen_poli']?></span></td>
</tr>
	<?php
	}//cierra el while
	?>
</table>
</form>
  <?php
	}else{//cierra el if ($res)
	}
	?>
 
       
<?php
$rowcont=$nove->numRows();
if ($rowcont > 0){
?>
<form action="" method="post" enctype="multipart/form-data" name="form7" id="form7">

<table width="930" align="center">
<tr>
<td height="24" colspan="9" bgcolor="#999999" ><div align="left"><span class="style82">&gt;&gt; NOVEDADES POLICIALES</span></div></td>
</tr>
<tr>
      <td width="92" bgcolor="#CCCCCC"><div align="center"><span class="style137 style114"><strong>N° INFORME </strong></span></div></td>
      <td width="124" bgcolor="#CCCCCC"><div align="center"><span class="style137 style114"><strong>FECHA/INFORME</strong></span></div></td>
      <td width="435" bgcolor="#CCCCCC"><div align="center"><span class="style137 style114"><strong>ASUNTO</strong></span></div></td>
      <td width="259" bgcolor="#CCCCCC"><div align="center"><span class="style137 style114"><strong>DEPENDENCIA</strong></span></div></td>
    </tr>
<?php

	while($no = $nove->fetchRow(MDB2_FETCHMODE_ASSOC)){ 
	$fch_info=$no['fch_info'];
	$id	=$no['id'];
	?>
	<tr>
	
<td height="20" bgcolor="#FFFFFF"><div align="center"><span class="style143 style118 style114">
<a href = "print_acta.php?id=<?=$id?>" ><?php echo $no['nronota']?></a>
</span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="style143 style118 style114"><?php echo date("d/m/Y", strtotime($fech_info)) ?></span></div></td>
<td bgcolor="#FFFFFF"><span class="style143 style118 style114"><?php echo $no['titulo']?></span></td>
<td bgcolor="#FFFFFF"><span class="style143 style118 style114"><?php echo $no['depend']?></span></td>
</tr>
	<?php
	}//cierra el while
	?>
</table>
</form>
  <?php
	}else{//cierra el if ($res)
	}
	?>
       
    

</body>
</html>			