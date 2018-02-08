<?php
if( sizeof( $fall ) > 0){
	?>
	<dl class="row">
		<dt class="col-12 col-md-3">FECHA DE FALLEC.:</dt>
		<dd class="col-12 col-md-3"><?=$fall['fecha_falle'] ?></dd>

		<dt class="col-12 col-md-3">HORA DE FALLEC.:</dt>
		<dd class="col-12 col-md-3"><?=$fall['hora_falle']?></dd>

		<dt class="col-12 col-md-3">LUGAR DE FALLEC.:</dt>
		<dd class="col-12 col-md-3"><?=$fall['lugarfalle']?></dd>

		<dt class="col-12 col-md-3">CIRCUNSTANCIA DE FALLEC.:</dt>
		<dd class="col-12 col-md-3"><?=$fall['circufalle']?></dd>

		<dt class="col-12 col-md-3">EDAD:</dt>
		<dd class="col-12 col-md-3"><?=$fall['edad']?></dd>

		<dt class="col-12 col-md-3">M&EACUTEDICO FORENSE:</dt>
		<dd class="col-12 col-md-3"><?=$fall['medico_foren']?></dd>

		<dt class="col-12 col-md-3">CAUSA:</dt>
		<dd class="col-12 col-md-3"><?=$fall['causa']?></dd>

		<dt class="col-12 col-md-3">INTERVINIENTES:</dt>
		<dd class="col-12 col-md-3"><?=$fall['intervinientes']?></dd>

		<dt class="col-12 col-md-3">JURISDICCI&OACUTEN:</dt>
		<dd class="col-12 col-md-3"><?=$fall['jurisdiccion']?></dd>

		<dt class="col-12 col-md-3">OBSERVACI&OACUTEN:</dt>
		<dd class="col-12 col-md-3"><?=$fall['observa']?></dd>
	</dl>
<?php
}
?>