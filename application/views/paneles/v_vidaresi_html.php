<?php 
 
 
$mov_domi= $domi; 
 
 
if( sizeof($mov_domi) > 0){?>

<div class='panel panel-info'>
<div class="panel-heading">Movimientos</div>
<div class="panel-body">
<?php
foreach($mov_domi as $it){
    
    $domicilio= $it['domicilio'];
    $domicilio_nro= $it['domicilio_nro'];
    $telefono=  $it['telefono']; 
    $mail= $it['mail'];
    $referencia= $it['referencia']; 
    $coordenada= $it['coordenada'];
    $observa= $it['observa'];
    
?>
<b  class="subt-in">Nro. Domicilio:</b>&nbsp;<?= $domicilio_nro?> &nbsp;
<b  class="subt-in">Domicilio:</b>&nbsp;<?=$domicilio?> &nbsp;
<b  class="subt-in">Tel&eacute;fono: </b> &nbsp; <?=$telefono?> &nbsp;
<b  class="subt-in">Mail:</b> &nbsp; <?= $mail ?> &nbsp; 
<b  class="subt-in">Referencia:</b>&nbsp;<?=$referencia?> &nbsp;
<b  class="subt-in">Coordenada: </b> &nbsp; <?= $coordenada?> &nbsp;
<b  class="subt-in">Observaci&oacute;n:</b> &nbsp; <?= $observa ?> &nbsp; 

<?php  

}/** End foreach **/

}/** Hay movimiento **/
else{  
    

     $TITULO= "No se encuentra datos";
    $MENSAJE= "No se encontraron registros de Vida y residencia " ;
    include('application/views/errors/errores.php');  }
?>

 
</div>
</div>