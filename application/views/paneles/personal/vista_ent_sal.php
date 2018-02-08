

<div>
<p> 
<?php

if( sizeof($ent_sal) > 0){
foreach($ent_sal as $it){ 

$mov= $it['tipo_mov'] == 'EN' ?"Entrada" :  "Salida";
$frase= $it['tipo_mov'] == 'EN' ?"Entr&oacute el " :  "Sali&oacute el ";
$destino= $it['ent_sal_destino'] == "" ? "***" :  $it['ent_sal_destino'];
$fecha=  $it['ent_sal_fecha'] == "" ? "***" :   $it['ent_sal_fecha'] ;
$medio=  $it['ent_sal_medio'] == "" ? "***" :   $it['ent_sal_medio'];
$chapa=  $it['ent_sal_chapa'] == "" ? "***" :    $it['ent_sal_chapa'];
$obs=   $it['ent_sal_observ']== "" ? "***" :  $it['ent_sal_observ'];
?>
<dl class="row hidden-md-up">
<dt class="col-4"><?= $frase  ?></dt><dd class="col-8"><?=  $fecha  ?></dd>
<dt class="col-12"><button class="btn btn-primary btn-small" data-target="#des-<?= $it['id_ent_sal'] ?>" data-toggle="modal">Ver m&aacute;s</button></dt>
</dl>

<div class="modal fade hidden-md-up" id="des-<?= $it['id_ent_sal'] ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

 <h5 class="modal-title">Detalles s/entr. y salidas</h5>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>     

</div>
<div class="modal-body">
<dl class="row">
<dt class="col-12">Tipo de mov.:</dt><dd class="col-12"><?=   $mov ?> </dd>
<dt class="col-12">Destino: </dt><dd class="col-12"><?= $destino ?></dd>
<dt class="col-12">Fecha</dt><dd class="col-12"><?=  $fecha  ?></dd>
<dt class="col-12">Medio: </dt><dd class="col-12"> <?= $medio ?></dd>
<dt class="col-12">Chapa: </dt><dd class="col-12"><?=  $chapa ?></dd>
<dt class="col-12">Observaci&oacute;n: </dt><dd class="col-12"><?= $obs   ?></dd>
</dl>
</div>

</div><!-- end modal content-->
</div><!-- end modal dialog -->
</div><!-- end modal -->

<dl class="row hidden-md-down">
<dt class="col-12 col-md-2">Tipo de mov.:</dt><dd class="col-12 col-md-2"><?=   $mov ?> </dd>
<dt class="col-12 col-md-2">Destino: </dt><dd class="col-12 col-md-2"><?= $destino ?></dd>
<dt class="col-12 col-md-2">Fecha</dt><dd class="col-12 col-md-2"><?=  $fecha  ?></dd>
<dt class="col-12 col-md-2">Medio: </dt><dd class="col-12 col-md-2"> <?= $medio ?></dd>
<dt class="col-12 col-md-2">Chapa: </dt><dd class="col-12 col-md-2"><?=  $chapa ?></dd>
<dt class="col-12 col-md-2">Observaci&oacute;n: </dt><dd class="col-12 col-md-2"><?= $obs   ?></dd>
</dl>
     
<?php  }/*** end foreach **/
} 




?> 
</p>
</div>
