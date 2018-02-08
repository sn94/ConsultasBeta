<?php
$datospoli= $poli; 
$datospol=  $poli;
foreach( $datospol as $it ){ $datospoli= $it;  }
?>

<div>
<p>
<div class="row">
<?php if( sizeof($datospoli) > 0){  ?>
<div class="col-sm-6">
<dl class="row">
<dt class="col-12 col-md-6">Fecha de ingreso: </dt> <dd class="col-12 col-md"><?= $datospoli['fecha_ing']?></dd>
<dt class="col-12 col-md-6">Decreto Nro.:</dt> <dd class="col-12 col-md"><?= $datospoli['decreto_nro'] ?></dd>
<dt class="col-12 col-md-6">Fecha grab.:</dt> <dd class="col-12 col-md"><?= $datospoli['fechagrab'] ?></dd>
<dt class="col-12 col-md-6">Servi. porta.: </dt> <dd class="col-12 col-md"><?= $datospoli['servi_porta']?></dd>
<dt class="col-12 col-md-6">Otro documento:</dt> <dd class="col-12 col-md"><?= $datospoli['otro_doc'] ?></dd>
<dt class="col-12 col-md-6">Estado:</dt> <dd class="col-12 col-md"><?= $datospoli['estado'] ?></dd>
<dt class="col-12 col-md-6">Motivo:</dt> <dd class="col-12 col-md"><?= $datospoli['motivo']?></dd>
</dl>
</div>
<div class="col-sm-6">
<dl class="row">
<dt class="col-12 col-md-6">Lugar de servicio.:</dt> <dd class="col-12 col-md"><?= $datospoli['lug_servi'] ?></dd>
<dt class="col-12 col-md-6">Promoci&oacute;n:</dt> <dd class="col-12 col-md"><?= $datospoli['promocion'] ?></dd>
<dt class="col-12 col-md-6">Cred. pol.: </dt> <dd class="col-12 col-md"><?= $datospoli['credpol']?></dd>
<dt class="col-12 col-md-6">Grado:</dt> <dd class="col-12 col-md"><?= $datospoli['grado_actual'] ?></dd>
<dt class="col-12 col-md-6">Motivo baja:</dt> <dd class="col-12 col-md"><?= $datospoli['motibaja'] ?></dd>
<dt class="col-12 col-md-6">Fecha de ingreso: </dt> <dd class="col-12 col-md"><?= $datospoli['fecha_ing']?></dd>
<dt class="col-12 col-md-6">Fecha de baja:</dt> <dd class="col-12 col-md"><?= $datospoli['fecha_baja'] ?></dd>
</dl>
</div>

<?php }else{  
    $TITULO= "Sin resultados";
    $MENSAJE=" No se registra datos policiales";
    include('application/views/errors/errores.php'); } ?>
</div><!-- fin row --> 
</p>
</div>