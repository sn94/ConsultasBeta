<?php
	
$Lista_denun= $vehiculo_denu;


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
  </div><!-- fin body panel -->

</div> <!-- fin columna 1 -->
  
 <?php
 
 } /** fin for each  **/
 echo "</div>"; /** Cerrar fila col 1 datos vehiculo col2 datos denuncia **/
  if(sizeof( $Lista_denun) <= 0){ 
echo "<div class='row'>
<span class='badge'><div class='col-sm-12'><h4>Sin denuncias</h4></span></div></div>";}

?>