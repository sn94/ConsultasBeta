<?php
 

  
$Cap001= $Cap;

$DetCap001= $Det;
  
 $bando=0;   $grupo_esta10=0;
  $fchcap11=0;
	  
	  foreach(  $Cap001 as $rowcap){
	  	
	  	
	       $cidcap=$rowcap['cidcap'];
		    $orden=$rowcap['orden'];
		    $clave=$rowcap['clave'];
		    $causa=$rowcap['causa'];
			$unidad=$rowcap['unidad'];
			$fecnota=$rowcap['fecnota'];
			$nronota=$rowcap['nronota'];
			$compete=$rowcap['compete'];
			$turno=$rowcap['turno'];
			$circun=$rowcap['circun'];
			$lugarh=$rowcap['lugarh'];
		    $juez=$rowcap['juez'];
			$secreta=$rowcap['secreta'];
			$interino=$rowcap['interino'];
			$fechagra=$rowcap['fechagra'];
			$horagra=$rowcap['horagra'];
			$usuario=$rowcap['usuario'];
			$observa=$rowcap['observa'];
			$situ=$rowcap['situ'];
			$tipose=$rowcap['tipose'];
			$nrose=$rowcap['nrose'];
			$scap=$rowcap['est_jud']; 
			$estado50=$rowcap['observa2']; 
			$nrocausa=$rowcap['nrocausa']; 
			$depend50=$rowcap['depend'];
			$fechaini=$rowcap['fechaini']; 
			$fechafin=$rowcap['fechafin']; 
			$horaini=$rowcap['horaini'];
			$horafin=$rowcap['horafin'];
			$dias_restri=$rowcap['dias_restri'];
			$autori=trim($rowcap['autoridad']); 
			$grupo_esta=$rowcap['grupo_esta'];
			$clave_aux=$rowcap['clave_aux'];
			$nro_exp=$rowcap['nro_exp'];
			$dictamen=$rowcap['dictamen'];
			$califica_final=$rowcap['califica_final'];
			
            
            
            
            
            
            
            $estado51 = explode(",", $estado50);
			if ($grupo_esta=='1' && ($bando==0)){
			    $grupo_esta10=1;
				$bando=1;
			}
			if ($grupo_esta=='1'){
			    $acap=substr($fecnota, 0, 4);
				$mcap=substr($fecnota, 5, 2);
				$dcap=substr($fecnota, 8, 2);
				$fchcap=$acap.$mcap.$dcap;
			    if ($fchcap>$fchcap11){
				   $fchcap11=$fchcap;
				}
				    
			}
					
			$estado52=count($estado51);
			$estado54='';
			for ($u=0; $u<$estado52; ++$u){
			    $estado53=substr(trim($estado51[$u]), 2); 
			    if ($u==0){
			        $estado54=$estado54.$estado53;
			    }else{
			        $estado54=$estado54.', '.$estado53;
			    }
			}
				 
			$estado55=$estado54;
					
		
			 
	?>
			
<div class="row">
<div class="col-12 col-md-3">

<dt class="col-12">Orden:</dt> <dd class="col-12"><?=$orden?></dd>
<dt class="col-12">Nro.Exp:</dt> <dd class="col-12"><?=$nro_exp?></dd>
<dt class="col-12">Nro.Causa:</dt>  <dd class="col-12"><?=$nrocausa?></dd>
<dt class="col-12">Nota:</dt> <dd class="col-12"><?=$nronota?> &nbsp;-&nbsp; <?=$fecnota?></dd>
<dt class="col-12">Causa:</dt> <dd class="col-12"> <?=$causa?></dd>
</div>   <!-- FIn  COLUMNA 1 -->

<div class="col-12 col-md-3">
<dl class="row">
<dt class="col-12">Situ:</dt><dd class="col-12"><?=$situ?></dd>
<dt class="col-12">Turno:</dt><dd class="col-12"><?=$turno?></dd>
<dt class="col-12">Comp:</dt> <dd class="col-12"><?=$compete?></dd>
<dt class="col-12">Sent.</dt> <dd class="col-12"><?= $tipose ?></dd>  
<dt class="col-12">Int: &nbsp;</dt> <dd class="col-12"><?=$interino?></dd>
</dl>

</div> <!-- FIn  COLUMNA 2 -->


<div class="col-12 col-md-3"> 
<dl class="row">
<dt class="col-12">Juez:</dt> <dd class="col-12"><?=$juez?></dd>
<dt class="col-12">Secret.</dt> <dd class="col-12"><?=$secreta?></dd>
<dt class="col-12">Lug.Hecho:</dt> <dd class="col-12"><?=$lugarh?></dd>
<dt class="col-12">Circ:</dt> <dd class="col-12"><?=$circun?></dd>
<dt class="col-12">Unid.</dt> <dd class="col-12"><?=$unidad?></dd>

</dl>
</div> <!-- FIn  COLUMNA 3 -->


<div class="col-12 col-md-3">
<dt class="col-12">Observ.:</dt>   <dd class="col-12"><?=$observa?></dd>
<dt class="col-12">Hora Rest:</dt>  <dd class="col-12"><?=$horaini?>-<?=$horaini?> </dd>
<dt class="col-12">Dias: </dt>    <dd class="col-12"><?=$dias_restri?></dd>
<dt class="col-12">Estado:</dt>  <dd class="col-12"><?=$estado50?></dd>
<dt class="col-12">Fch.Perm:</dt> <dd class="col-12"><?=$fechaini?>-<?=$fechafin?>&nbsp;<?=$usuario?></dd>
<dt class="col-12">Depend.Carga:</dt> <dd class="col-12"><?=   $depend50 ?></dd>
<dt class="col-12">Fch.Grab:</dt> <dd class="col-12"> <?=$fechagra?></dd>
</div><!-- FIn  COLUMNA 4 -->
</div><!-- FIn   ROW   -->

<?php
	 }/** for each **/
     
if( sizeof( $Cap001) <=0 ){
     $TITULO= "No se encuentra datos";
    $MENSAJE= "No se registran datos judiciales" ;
    include('application/views/errors/errores.php'); 
} 		 
	

?>