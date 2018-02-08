<?php
$ced_padre= $nom_padre= $ape_padre= $ced_madre= $nom_madre= $ape_madre=null;
 $ced_conyu= $nom_conyu= $ape_conyu= null;
 
 
$dat_personales= $familia;


if( sizeof( $dat_personales) > 0){
    $dat_p= $dat_personales[0];
    
 
 $ced_padre= $dat_p['padre_cedul'];
 $nom_padre= $dat_p['padre_nombre'];
  $ape_padre= $dat_p['padre_apelli'];
   $ced_madre= $dat_p['madre_cedul'];
 $nom_madre= $dat_p['madre_nombre'];
  $ape_madre= $dat_p['madre_apelli'];
   $ced_conyu= $dat_p['conyu_cedul'];
  $nom_conyu= $dat_p['conyu_nombre'];
 $ape_conyu= $dat_p['conyu_apelli'];
	   }
?>


<div>
<p>
<div class="row">

<div class="col-12 col-md">
<dl class="row">
<dt class="col-12">C.I del padre: </dt> <dd class="col-12"><?= $ced_padre?></dd>
<dt class="col-12">Nombres:</dt> <dd><?=$nom_padre?></dd>
<dt class="col-12">Apellidos:</dt> <dd><?=$ape_padre?><dd>
</dl>
</div>

<div class="col-12 col-md">
<dl class="row">
<dt class="col-12">C.I de la madre </dt> <dd><?=  $ced_madre ?></dd>
<dt class="col-12">Nombres:</dt> <dd><?=$nom_madre?></dd>
<dt class="col-12">Apellidos:</dt> <dd><?=$ape_madre?></dd>
</dl>
</div>

<div class="col-12 col-md">
<dl class="row">
<dt class="col-12">C.I del conyuge </dt> <dd><?= $ced_conyu ?></dd>
<dt class="col-12">Nombres:</dt> <dd><?=$nom_conyu?></dd>
<dt class="col-12">Apellidos:</dt> <dd><?=$ape_conyu?></dd>
</dl>
</div>

<div class="col-12">
<?php
$tituloModal="RELACIONES DE PARENTESCO";
$nuevoid= "modal-parentesco-".$nroci;
?>
<button onclick="datosParentesco();" class="btn btn-primary" data-toggle="modal" data-target="#<?= $nuevoid ?>" >Relaciones de parentesco</button>
<?php   include("application/views/templates/vista_modal.php"); ?>
</div>
</div>

</p>
</div> 
<script type="text/javascript">
	
function datosParentesco(){
	var ruta= "<?=base_url()?>index.php/Consulta/parentescos/<?= $nroci ?>";

	$.ajax({
	url: ruta,
	beforeSend: function(a){ $("#<?= $nuevoid?>-c").html("<img class='mx-auto my-auto' style='width: 40px; height: 40px;' src='<?= base_url()?>img/wait.gif'>");},
	success: function(data){ $("#<?= $nuevoid?>-c").html(data); }
});
}
</script>
