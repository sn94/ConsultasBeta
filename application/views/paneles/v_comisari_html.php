<?php
  

/** DATOS DE DETENCION  **/
$t=0;
foreach(  $deten  as $it ){
    if(  $t==  0){?>
    <dl class="row">
     <dt class="col-12 col-md-3">Tipo de registro:</dt> <dd class="col-12 col-md-3"><?= $it['tipomov']?></dd>
<dt class="col-12 col-md-3">Lugar de aprehensi&oacute;n:</dt>  <dd class="col-12 col-md-3"><?= $it['lugardeten']?></dd>
<dt class="col-12 col-md-3">Fecha de aprehensi&oacute;n:</dt>  <dd class="col-12 col-md-3"><?= $it['fechadeten']?></dd>
 <dt class="col-12 col-md-3">Motivo de aprehensi&oacute;n:</dt> <dd class="col-12 col-md-3"><?= $it['motivodeten']?></dd>
<dt class="col-12 col-md-3">Familiar:</dt>       <dd class="col-12 col-md-3"><?= $it['familiardeten']?></dd>
<dt class="col-12 col-md-3">Personal interviniente:</dt>  <dd class="col-12 col-md-3"><?= $it['polic_interv']?></dd>
 <dt class="col-12">Obs.:</dt> <dd><?= $it['obsdeten']?></dd>
    </dl>

 
<?php }else{   ?>

<div class="card">
<h4 class="card-title">CI: <?= $it['ci']?></h4>
<h5 class="card-subtitle">Motivo: <?= $it['motivomov']?></h5>
<div class="card-block">
<dl class="row"> 
<dt class="col-12 col-md-3">Tipo de movimiento:</dt> <dd class="col-12 col-md-3"><?= $it['tipomovdet']?></dd>
<dt class="col-12 col-md-3">Fecha movimiento:</dt>   <dd class="col-12 col-md-3"><?= $it['fechamov']?></dd>

<dt class="col-12 col-md-3">Lugar remisi&oacute;n:</dt> <dd class="col-12 col-md-3"><?= $it['lugarrem']?></dd>
<dt class="col-12 col-md-3">Personal interviniente:</dt> <dd class="col-12 col-md-3"><?= $it['polimov']?></dd>
 <dt class="col-12 col-md-3">Obs.:</dt> <dd class="col-12 col-md-9"><?= $it['obsmov']?></dd>
 </dl>
</div><!-- end card block -->
</div>


    
<?php  }  $t++;   }     ?>