<?php
	foreach( $Det as $de){ ?>
	 
<div class="panel panel-primary">
<div class="panel-heading">Id. <?php  $de['id'] ?> </div>
<div class="panel-body">
<b class="subt-in">Est. Jud.:</b>&nbsp;<?= $de['est_jud']?> 
<b class="subt-in">Situaci&oacute;n:</b>&nbsp;<?=  $de['situ']  ?>
 <b class="subt-in">Estado:</b>&nbsp;<?= $de['tipo_esta']?> 
<b class="subt-in">Descripci&oacute;n.</b>&nbsp;<?=  $de['descrip']  ?>
</div>
</div> 
  
       
       
<?php
 }
?>