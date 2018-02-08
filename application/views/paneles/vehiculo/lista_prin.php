<?php

   
   /** Datos de vehiculo  **/

$Lista_vehi=  $vehiculo_dato;
$Lista_denun= sizeof( $vehiculo_denu);


     
           
if( sizeof($Lista_vehi) > 0  ){
    
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
    
if( $Lista_denun <= 0){ echo "<div class='col-sm-12 panel panel-info'>"; }
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
 } /** fin for each **/

}/** Obtencion exitosa de datos de vehiculos **/       
   
 	
?>