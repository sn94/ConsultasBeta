<?php  foreach($basico as $b){  ?>
    
 
   


<div class="container">

<div class="row">
<div class="col-12">

<div class="media">
  <?php  $ced= $b['nrodoc']; ?>
 <iframe class="d-flex align-self-start mr-3 mb-3" src='http://172.16.0.20/id_consultas/ver_foto_pn.php?cedula=<?= $ced ?>&tipo=1' width='170' height='250' frameborder='0' scrolling='no' target='_blank'></iframe> 


  <div class="media-body">
  
  <?php
$labelCaptura= "SIN CAPTURA";
if($captura)  $labelCaptura= "<span class='badge badge-danger'>TIENE CAPTURA</span>";
?>
 <h3 class="mt-0"><?= $labelCaptura?></h3>
  <h3  ><?=   $b['nombre'].' '. $b['apellido'] ?></h3>
   <h3 ><span class="badge badge-pill badge-primary">CI&deg;: <?= $b['nrodoc'] ?></span></h3>

<dl class="row" >
 <dt class="col-12 col-md-2">Fecha de nacimiento: </dt> <dd class="col-12 col-md"><?=   $b['fechanac'] ?></dd>
<dt class="col-12 col-md-2">Nacionalidad: </dt> <dd class="col-12 col-md"><?=   $b['nac_desc'] ?></dd>
<dt class="col-12 col-md-2">Nacionalidad de origen: </dt> <dd class="col-12 col-md"><?=   $b['nacio_orig'] ?></dd>
<dt class="col-12 col-md-2">Sexo: </dt>  <dd class="col-12 col-md"><?=   $b['sexo'] ?></dd>
<dt class="col-12 col-md-2">Estado civil: </dt>  <dd class="col-12 col-md"><?=   $b['estado_civil'] ?></dd>
<dt class="col-12 col-md-2">Profesi&oacute;n: </dt>  <dd class="col-12 col-md"><?=   $b['profesion'] ?></dd>
<dt class="col-12 col-md-2">Domicilio: </dt>  <dd class="col-12 col-md"><?=   $b['domicilio'] ?></dd>

<?php 
$labelPoli= "<span class='badge badge-pill badge-default'><h4>No es personal policial</h4></span>";
 if(  $b['ispolice'] !='no') 
 $labelPoli= "<span class='badge badge-pill badge-success'><h4>Es personal policial</h4></span>";
 ?>
<dt class="col-12 col-md-4"><?=  $labelPoli ?></dt>
 </dl>

 </div>
</div>


</div><!-- end col -->
</div><!-- end row -->







</div>

<?php 
}
?>

 <script type="text/javascript">
 
 $(document).ready(function(){
var iframe=  $( "#prueba iframe");
var imagen= $(iframe,"img");
var imagensrc= $(imagen).attr("src");


 $( "#prueba iframe html body").css("padding", "0");
 
$(iframe,"img").addClass("d-flex");
$(iframe, "img").addClass("mr-3");
$(iframe, "img").addClass("align-self-center");
$(iframe, "img").css("padding","0");
$(iframe, "img").css("margin","0");
 
 
 });
 
 </script>
 
 