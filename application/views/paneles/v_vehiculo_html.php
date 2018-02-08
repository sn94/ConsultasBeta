<?php

 
 $lista_id_vehiculos= $vehiculo_titu;
 
 foreach($lista_id_vehiculos as $idv){
  
  

   
   /** Datos de vehiculo y denuncias  **/

$Lista_vehi=  datos_vehiculo(  $idv['id_vehic']  );
$Lista_denun= datos_denuncia(  $idv['id_vehic']  );


           /** end bindings **/
           
if( sizeof($Lista_vehi) <= 0  ){ echo "NADA"; }
else{
    
    
echo "<div class='row'>";

foreach( $Lista_vehi as $lista_vehi){
    
/** ***  *** ***  *** ***/
$id_v= $lista_vehi['id'];
$nro_chapa=  $lista_vehi['nro_chapa']; 
$tipo_vehiculo= $lista_vehi['tipo_vehiculos']; 
$marca= $lista_vehi['marca']; 
$modelo= $lista_vehi['modelo']; 
$ano_fabrica= $lista_vehi['ano_fabrica']; 
$ano_modelo= $lista_vehi['ano_modelo']; 
$color= $lista_vehi['color']; 
$pais_fabrica= $lista_vehi['pais_fabrica']; 
$nro_chasis= $lista_vehi['nro_chasis']; 
$marca_chasis= $lista_vehi['marca_chasis']; 
$nro_motor= $lista_vehi['nro_motor']; 
$tipo_inscripcion= $lista_vehi['tipo_inscripcion']; 
$uso= $lista_vehi['uso']; 
$fecha_actu= $lista_vehi['fecha_actu']; 
/** *** *** *** *** *** ***/  
    
if( sizeof($Lista_denun) <= 0){ echo "<div class='col-sm-12 panel panel-info'>"; }
else{   echo "<div class='col-sm-6 panel panel-info'>"; }
 ?>

  <div class="panel-heading">Veh&iacute;culos</div>
  <div class="panel-body">

<b class="subt-in">Id.:</b> &nbsp; <?=$id_v?> &nbsp;&nbsp;
<b  class="subt-in">Nro. de chapa:</b> &nbsp; <?=$nro_chapa?> &nbsp;
<b  class="subt-in">Tipo de veh&iacute;culo:</b>&nbsp;<?=$tipo_vehiculo?> &nbsp;
<b  class="subt-in">Marca:</b>&nbsp;<?=$marca?> &nbsp;
<b  class="subt-in">Modelo:</b> &nbsp; <?=$modelo?> &nbsp;&nbsp;
<b  class="subt-in">A&ntilde;o (fabricaci&oacute;n):</b> &nbsp; <?=$ano_fabrica?> &nbsp;
<b  class="subt-in">A&ntilde;o modelo:</b>&nbsp;<?= $ano_modelo?> &nbsp;
<b  class="subt-in">Color:</b> &nbsp; <?=$color?> &nbsp;&nbsp;

<b  class="subt-in">Pa&iacute;s(fabricaci&oacute;n):</b> &nbsp; <?=$pais_fabrica?> &nbsp;
<b  class="subt-in">Nro. chasis:</b>&nbsp;<?= $nro_chasis?> &nbsp;
<b  class="subt-in">Marca chasis:</b> &nbsp; <?=$marca_chasis?> &nbsp;&nbsp;
<b  class="subt-in">Nro. motor:</b> &nbsp; <?=$nro_motor?> &nbsp;
<b  class="subt-in">Tipo de inscripci&oacute;n:</b>&nbsp;<?= $tipo_inscripcion?> &nbsp;
<b  class="subt-in">Uso:</b> &nbsp; <?=$uso?> &nbsp;
<b  class="subt-in">Fecha de act:</b>&nbsp;<?= $fecha_actu?> &nbsp;

</div>

</div> <!-- fin columna 1 -->
  
<?php
 } /** fin res2 **/
 ?>
 
 
 
 <?php
foreach($Lista_denun as $lista_denun){


$clave= $lista_denun['clave'];
$fecha= $lista_denun['fecha'];
$nro_chapad= $lista_denun['nro_chapa'];
$nro_chasisd= $lista_denun['nro_chasis'];
$nro_motord= $lista_denun['nro_motor'];   
$marcad= $lista_denun['marca'];
$modelod= $lista_denun['modelo'];
$tipo_autod= $lista_denun['tipo_auto'];
$colord= $lista_denun['color'];
$separti= $lista_denun['separti'];
$observa= $lista_denun['observa'];
$denuncia= $lista_denun['denuncia'];
$situacion= $lista_denun['situacion'];
?>

<div class="col-sm-6 panel panel-info">
  <div class="panel-heading">Denuncias</div>
  <div class="panel-body">
  
<b  class="subt-in">Clave:</b> &nbsp; <?=$clave?> &nbsp;&nbsp;
<b  class="subt-in">Fecha:</b> &nbsp; <?=$fecha?> &nbsp;
<b  class="subt-in">Nro. chapa:</b>&nbsp;<?=$nro_chapad?> &nbsp;
<b  class="subt-in">Nro. chasis:</b>&nbsp;<?=$nro_chasisd?> &nbsp;
<b  class="subt-in">Nro. motor:</b> &nbsp; <?=$nro_motord?> &nbsp;&nbsp;
<b  class="subt-in">Marca:</b> &nbsp; <?=$marcad?> &nbsp;
<b  class="subt-in">Modelo:</b>&nbsp;<?= $modelod?> &nbsp;
<b  class="subt-in">Tipo auto:</b> &nbsp; <?=$tipo_autod?> &nbsp;&nbsp;
<b class="subt-in">Color:</b> &nbsp; <?=$colord?> &nbsp;
<b  class="subt-in">Separti:</b>&nbsp;<?= $separti?> &nbsp;
<b  class="subt-in">Obs.:</b> &nbsp; <?=$observa?> &nbsp;&nbsp;
<b  class="subt-in">Denuncia:</b> &nbsp; <?=$denuncia?> &nbsp;
<b  class="subt-in">Situaci&oacute;n:</b>&nbsp;<?= $situacion?> &nbsp;
  </div>

</div> <!-- fin columna 1 -->
  
 <?php
 
 } /** fin res3  **/
  echo " </div> "; // Fin fila
 ?>
 
 
 
 
 
 
 <?php


  if(sizeof( $Lista_denun) <= 0){ 
echo "<div class='row'>
<span class='badge'><div class='col-sm-12'><h4>Sin denuncias</h4></span></div></div>";}

 
}/** Obtencion exitosa de datos de vehiculo y denuncias **/       
   
   
   
   
   
   
  
 /**    Titulares **/
 $Lista_titulares= obtener_datos_titular( $idv['id_vehic']  );
if( sizeof($Lista_titulares)  <= 0){  echo "NADA";   }
else{
?>

<div class='row'>
<div class="col-sm-12 panel panel-info">
  <div class="panel-heading">Titular/es </div>
  <div class="panel-body">
  
  <?php
 foreach( $Lista_titulares as $lista_tit){  

 /** ** ***/
 $tipo_docu= $lista_tit['tipo_docu'];
$nro_docu= $lista_tit['nro_docu'];
$nombape= $lista_tit['nombape'];
$nacional= $lista_tit['nacional'];
$porce_titular= $lista_tit['porce_titular'];
/** *** ***/
 ?>

<p>
<img src="img/icon_list.png" />
<b class="subt-in">Tipo doc.:</b> &nbsp; <?=$tipo_docu?> &nbsp;
<b class="subt-in">Nro. de doc. :</b>&nbsp;<?=$nro_docu?> &nbsp;
<b class="subt-in">Nombre y apellido:</b>&nbsp;<?=$nombape?> &nbsp;
<b class="subt-in">Nacionalidad:</b> &nbsp; <?=$nacional?> &nbsp;
<b class="subt-in">Porc. titular:</b>&nbsp;<?= $porce_titular?> &nbsp;
</p>

<?php
   }/** fin while titulares **/ 
?>

</div>
</div> <!-- fin PANEL -->
</div><!-- fin BOX titulares -->



<?php  
 }/**  obtencion exitosa de titulares **/ 





 }/** fin foreach recorrido de ids de vehiculos **/
 
 if(  sizeof( $lista_id_vehiculos) <= 0 ){
    mostrarError_Developer("No se encuentra datos", "No se registran vehiculos a nombre de esta persona");       
} /**  Si no hay resultados en registros de titulares de vehiculos **/


?>