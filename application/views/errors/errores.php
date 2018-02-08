<?php
$TITULO= $datos['TITULO'];
$MENSAJE= $datos['MENSAJE'];

?>
<div class="alert alert-warning alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $TITULO?>: </strong> <?=$MENSAJE ?>
</div>
