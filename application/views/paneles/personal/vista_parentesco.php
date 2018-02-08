<?php  
foreach( $parentesco as $p){?>
    
<dl class="row">
<dt class="col-12 col-md-6">Nro. CI:</dt><dd class="col-12 col-md"><?= $p['nrodoc_vin'] ?></dd>
<dt class="col-12 col-md-6">V&iacute;nculo:</dt><dd class="col-12 col-md"><?= $p['vinculo'] ?></dd>
<dt class="col-12 col-md-6">Tel&eacute;fono:</dt><dd class="col-12 col-md"><?= $p['telefono'] ?></dd>
<dt class="col-12 col-md-6">Domicilio:</dt><dd class="col-12 col-md"><?= $p['domicilio'] ?></dd>
<dt class="col-12 col-md-6">Obs.:</dt><dd class="col-12 col-md"><?= $p['observa'] ?></dd>
</dl>

<?php
} 
?>
