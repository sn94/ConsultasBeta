<?php
	 $cutis;
   $civiles;
   $profesiones;
   $alias;
   $etnias;
   $estatura;
   $domicilio;
   $ciudades;
   $barrios;
   $celular1;
   $telefono;
   $celular2;
   $observa;
   $fechagra;  
   
$rowper15= $fichaje_d;

if( sizeof( $rowper15)  >0){
    
$cutis=$rowper15['cut_descri'];
   $civiles=$rowper15['est_descri'];
   $profesiones=$rowper15['prof_descri'];
   $alias=$rowper15['alias'];
   $etnias=$rowper15['etn_descri'];
   $estatura=$rowper15['estatura'];
   $domicilio=$rowper15['domicilio'];
   $ciudades=$rowper15['ciu_descri'];
   $barrios=$rowper15['dbar_descri'];
   $celular1=$rowper15['linea_celular1'];
   $telefono=$rowper15['linea_baja'];
   $celular2=$rowper15['linea_celular2'];
   $observa=$rowper15['observacion'];
   $fechagra=$rowper15['fechagra'];   
   
   ?>
   <div class="container">
 <dl class="row">
 <dt class="col-12 col-md-6">
 <dl class="row">
 <dt class="col-12 col-md-6">Cutis:</dt> <dd class="col-12 col-md-6"> <?=$cutis?></dd>
<dt class="col-12 col-md-6">Estado civil:</dt> <dd class="col-12 col-md-6"> <?=$civiles?> </dd>
<dt class="col-12 col-md-6">Profesiones:</dt> <dd class="col-12 col-md-6"><?=$profesiones?></dd>  
<dt class="col-12 col-md-6">Alias:</dt> <dd class="col-12 col-md-6"><?=$alias?></dd>
<dt class="col-12 col-md-6">Etnia:</dt>   <dd class="col-12 col-md-6"><?=$etnias?> </dd>
<dt class="col-12 col-md-6">Estatura:</dt>  <dd class="col-12 col-md-6"><?=$estatura?></dd>  
<dt class="col-12 col-md-6">Domicilio:</dt>  <dd class="col-12 col-md-6"><?= $domicilio?></dd>
 </dl>
 </dt>
  
  <dt class="col-12 col-md-6">
  <dl class="row">
 <dt class="col-12 col-md-6">Ciudad:</dt>  <dd class="col-12 col-md-6"><?=$ciudades?></dd>  
<dt class="col-12 col-md-6">Barrio:</dt>   <dd class="col-12 col-md-6"><?=$barrios?>  </dd>
<dt class="col-12 col-md-6">Celular 1:</dt>  <dd class="col-12 col-md-6"><?= $celular1?></dd>
<dt class="col-12 col-md-6">Celular 2:</dt> <dd class="col-12 col-md-6"> <?=$celular1?> </dd>
<dt class="col-12 col-md-6">Linea baja:</dt>  <dd class="col-12 col-md-6"><?=$telefono?></dd>
<dt class="col-12 col-md-6">Obs.:</dt> <dd class="col-12 col-md-6"><?= $observa?></dd>
<dt class="col-12 col-md-6">Fecha de grab.:</dt> <dd class="col-12 col-md-6"><?= $fechagra?></dd>
 </dl>
 </dt>

</dl> 
  
</div>
 
 
    
   
<?php   }    ?>