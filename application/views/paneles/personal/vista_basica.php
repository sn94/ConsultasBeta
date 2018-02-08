<?php 
 
 

$nroci= $nom = $ape= $tip_doc= $fec_nac= $edad= $nro_pro=$naci= $naci_ori= $lug_nac=$sexo= $est_civil= $profesion= null;
$domicilio= $barrio= $telefono=  $celular= $cedula_poli= $inactivo= $captu= null;
$estado=  $mail= $isDead= null;

$dat_personales= $personal;

if( sizeof( $dat_personales) > 0){
    $dat_p= $dat_personales[0];
    
 $nroci=  $dat_p['nrodoc'];
  $nom= $dat_p['nombre'];
   $ape= $dat_p['apellido'];
   $tip_doc= $dat_p['tipodoc'];
  $fec_nac= $dat_p['fechanac'];
  $edad= $dat_p['edad50'];
   $nro_pro= $dat_p['nropro'];
   $naci= $dat_p['nac_desc'];
    $naci_ori= $dat_p['nacio_orig'];
    $lug_nac= $dat_p['lugnac'];
     $sexo= $dat_p['sexo'];
      $est_civil= $dat_p['estado_civil'];
   $profesion= $dat_p['profesion'];
  $domicilio= $dat_p['domicilio'];
  $barrio= $dat_p['barrio_ciudad'];
 $telefono= $dat_p['telefono'];
  $celular= $dat_p['celular'];
   
  $mail= $dat_p['mail'];   
  $captu= $dat_p['captu'];
 
$isDead= $fallecido;
  $estado= $dat_p['estado'];
   $cedula_poli= $dat_p['cedpol'];
    $inactivo= $dat_p['motibaja'];
   
 

       
if ($fec_nac!=''){  
date_default_timezone_set("America/Asuncion");
    
$fec_nac=date("d-m-Y",strtotime($fec_nac));   }
        
$campoJudicial= $judi;
	$situ_captu= $campoJudicial['titulo'];
    $ante_desc= $campoJudicial['descri'];
   
      
?>


<div>
<p> 

 

<div class="row">
<div class="col-12 col-md-3">
<?php  
echo ("<iframe src='http://172.16.0.20/id_consultas/ver_foto_pn.php?cedula=$nroci&tipo=1' width='170' height='250' frameborder='0' scrolling='no' target='_blank'></iframe>"); 
include("application/views/paneles/personal/inc_modales.php");  ?>
</div>


<div class="col-12 offset-md-1 col-md-4">
<dl class="row">
<dt class="col-12">Nro.Documento.:</dt> <dd class="col-12"><?= $nroci ?> &nbsp;<?= $nom ?> &nbsp;<?= $ape ?></dd>
<dt class="col-12">Tipo de Documento:</dt> <dd class="col-12"><?=$tip_doc?></dd>
<dt class="col-12">Fecha de nacimiento: </dt> <dd class="col-12"><?=$fec_nac?></dd>
<dt class="col-12">Edad:</dt> <dd class="col-12"><?=$edad?></dd>
<?php if( $cedula_poli =='ES PERSONAL POLICIAL'){ ?>
<dt class="col-12"><span class='badge badge-info'><?=$cedula_poli?></span></dt> <dd></dd>
<?php }else{ ?>
<dt class="col-12"><span class='badge badge-default'><?=$cedula_poli?></span></dt> <dd></dd>
<?php }  ?>
<dt class="col-12"><?=$ante_desc?></dt> <dd></dd>
<dt class="col-12">Nro. Prontuario:</dt><dd class="col-12"><?=$nro_pro?></dd>                             
<dt class="col-12">Nacionalidad:</dt><dd class="col-12"><?=$naci?></dd>
<dt class="col-12">Nacionalidad de origen:</dt> <dd class="col-12"><?=$naci_ori?></dd>
</dl>
</div> <!-- columna -->



<div class="col-12 col-md-4">
<dl class="row"> 
<dt class="col-12"><?= $captu?"<span class='badge badge-danger'>CAPTURA</span>":"<span class='badge badge-pill badge-default'>SIN CAPTURA</span>" ?></dt>
<dt class="col-12">Lugar de nacimiento:</dt> <dd class="col-12"><?=$lug_nac?></dd>
<dt class="col-12">Sexo:</dt>  <dd class="col-12"><?=$sexo?></dd>
<dt class="col-12">Estado civil:</dt> <dd class="col-12"><?=$est_civil?></dd>
<dt class="col-12">Profesion:</dt>  <dd class="col-12"><?=$profesion?></dd>
<dt class="col-12">Domicilio:</dt> <dd class="col-12"><?=$domicilio?></dd>
<dt class="col-12">Barrio:</dt> <dd class="col-12"><?=$barrio?></dd>
<dt class="col-12">Telefono:</dt> <dd class="col-12"><?=$telefono?></dd>
<dt class="col-12">Celular:</dt> <dd class="col-12"><?=$celular?></dd>
<dt class="col-12">Mail:</dt> <dd class="col-12"><?=$mail?></dd>
</dl>
</div> <!-- columna -->

</div>



</p>
</div>
<?php  } ?>