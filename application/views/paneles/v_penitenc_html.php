<?php
 
 $datos=  $peni;
 
 foreach( $datos as $car){
    
 
	$fechamov=$car['fecha_mov'];
	$fechaent=$car['fecha_ent'];
	$fechasal=$car['fecha_sal'];
    $entrada=$car['entrada'];
    $salida= $car['salida'];
    $lugar= $car['lugar'];
	$estado=$car['estado'];
    $mov= $car['mov'];
    $causa= $car['causa'];
 ?>
<b  class="subt-in">Tipo mov.:</b> &nbsp; <?=$entrada?> &nbsp; <?= $salida ?> &nbsp;
<b  class="subt-in">Fecha: </b> &nbsp; <?=$fechaent?> &nbsp;<?= $fechasal?> &nbsp;
<b  class="subt-in">Lugar:</b>&nbsp;<?=$lugar?> &nbsp;
<b  class="subt-in">Estado:</b>&nbsp;<?=$estado?> &nbsp; <?= $mov ?> &nbsp; <?= $fechamov?>
<b  class="subt-in">Causa:</b> &nbsp; <?= $causa ?> &nbsp;&nbsp;

 
 <?php  
 }/** end foreach **/ 
 
 if(  sizeof( $datos) <= 0  ){
      $TITULO= "No se encuentra datos";
    $MENSAJE= "No se registran movimientos en penitenciarias" ;
    include('application/views/errors/errores.php');  
 }

?>