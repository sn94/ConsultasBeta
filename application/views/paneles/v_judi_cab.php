<?php
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
<div class="col-sm-3">

<b class="subt">Orden:</b> &nbsp;<?=$orden?>&nbsp;&nbsp;
<b class="subt">Nro.Exp:</b> &nbsp; <?=$nro_exp?>&nbsp;
<b class="subt">Nro.Causa:</b> &nbsp; <?=$nrocausa?>
<b class="subt">Nota:</b> &nbsp; <?=$nronota?> &nbsp;-&nbsp; <?=$fecnota?>
<b class="subt">Causa:</b> &nbsp;<?=$causa?>
</div>   <!-- FIn  COLUMNA 1 -->

<div class="col-sm-3">
<b class="subt">Situ:</b> &nbsp;<b class="subt"><?=$situd?></b>
<b class="subt">Turno:</b> &nbsp; <?=$turno?> &nbsp;&nbsp;
<b class="subt">Comp:</b> &nbsp; <?=$compete?> &nbsp;
<b class="subt">Sent.</b>&nbsp; <?= $tipose ?> &nbsp; 
<b class="subt">Int: &nbsp;</b> <?=$interino?>&nbsp;
</div> <!-- FIn  COLUMNA 2 -->


<div class="col-sm-3">
<b class="subt">Causa:</b> &nbsp;<?=$nrocausa?>
<b class="subt">Juez:</b> &nbsp;<?=$juez?>
<b class="subt">Secret.</b> &nbsp;<?=$secreta?>
<b class="subt">Lug.Hecho:</b> &nbsp;<?=$lugarh?>
<b class="subt">Circ:</b> &nbsp;<?=$circun?>&nbsp;
</div> <!-- FIn  COLUMNA 3 -->


<div class="col-sm-3">
<b class="subt">Unid.</b>&nbsp;<?=$unidad?>
<b class="subt">Observ.:</b> &nbsp; <?=$observa?>
<b class="subt">Hora Rest:</b> &nbsp;<?=$horaini?>-<?=$horaini?>&nbsp;
<b class="subt">Dias:&nbsp; <?=$dias_restri?></b>
<b class="subt">Estado:</b> &nbsp;<?=$estado50?>
<b class="subt">Fch.Perm:</b> <?=$fechaini?>-<?=$fechafin?>&nbsp;<?=$usuario?>
<b class="subt">Depend.Carga:</b> &nbsp;<?=   $depend50 ?>
<b class="subt">Fch.Grab:</b> &nbsp;<?=$fechagra?>
</div><!-- FIn  COLUMNA 4 -->
</div><!-- FIn   ROW   -->


