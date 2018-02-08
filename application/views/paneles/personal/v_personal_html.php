<?php 
 
 

$nroci= $nom = $ape= $tip_doc= $fec_nac= $edad= $nro_pro=$naci= $naci_ori= $lug_nac=$sexo= $est_civil= $profesion= null;
$domicilio= $barrio= $telefono=  $celular= $cedula_poli= $inactivo= null;
$ced_padre= $nom_padre= $ape_padre= $ced_madre= $nom_madre= $ape_madre=null;
 $ced_conyu= $nom_conyu= $ape_conyu= $estado=  $mail= $isDead= null;

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
   
  foreach($domi as $i){
  $mail= $it['mail'];   
  }
 
$isDead= $fallecido;
 $ced_padre= $dat_p['padre_cedul'];
 $nom_padre= $dat_p['padre_nombre'];
  $ape_padre= $dat_p['padre_apelli'];
   $ced_madre= $dat_p['madre_cedul'];
 $nom_madre= $dat_p['madre_nombre'];
  $ape_madre= $dat_p['madre_apelli'];
   $ced_conyu= $dat_p['conyu_cedul'];
  $nom_conyu= $dat_p['conyu_nombre'];
 $ape_conyu= $dat_p['conyu_apelli'];
  $estado= $dat_p['estado'];
   $cedula_poli= $dat_p['cedpol'];
    $inactivo= $dat_p['motibaja'];
   



$datospoli= $poli; 
$datospol=  $poli;
foreach( $datospol as $it ){ $datospoli= $it;  }

       
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
<div class="col-sm-3">
<?php  
echo ("<iframe src='http://172.16.0.20/id_consultas/ver_foto_pn.php?cedula=$nroci&tipo=1' width='170' height='250' frameborder='0' scrolling='no' target='_blank'></iframe>"); 
include("application/views/paneles/personal/inc_modales.php");  ?>
</div>


<div class="col-sm-offset-1 col-sm-4">
<b class="subt">Nro.Docu.:</b>&nbsp;<span> <?= $nroci ?></span>&nbsp;<span><?= $nom ?></span>&nbsp;<span><?= $ape ?></span>
<b class="subt">Tipo de Documento:</b>&nbsp;<span><?=$tip_doc?></span>
<b class="subt">Fecha de nacimiento: </b>&nbsp;<span><?=$fec_nac?></span>
<b class="subt">Edad:</b>&nbsp;<span><?=$edad?></span>
<b class="subt"></b></b> &nbsp; <span style="background-color: beige; font-weight: bold; border: aquamarine solid 1px;"><?=$cedula_poli?></span>
<b class="subt"></b></b> &nbsp; <span style="background-color: beige; font-weight: bold; border: aquamarine solid 1px;"><?=$ante_desc?></span>
<b class="subt">Nro. Prontuario:</b>&nbsp;<span><?=$nro_pro?> </span>                              
<b class="subt">Nacionalidad:</b>&nbsp;<span><?=$naci?></span>
<b class="subt">Nacionalidad de origen:</b>&nbsp;<span><?=$naci_ori?></span>
</div> <!-- columna -->

<div class="col-sm-4">
<?php 
if( $captu ){
    echo "<b class='subt' style='background-color: red; border-color:gray; border-radius:25px;'>Tiene Captura</b>";
}
 ?>

<b class="subt">Lugar de nacimiento:</b>&nbsp;<span><?=$lug_nac?></span>
<b class="subt">Sexo:</b>&nbsp;<span><?=$sexo?></span>
<b class="subt">Estado civil:</b>&nbsp;<span><?=$est_civil?></span>
<b class="subt">Profesion:</b>&nbsp;<span><?=$profesion?></span>
<b class="subt">Domicilio:</b>&nbsp;<span><?=$domicilio?></span>
<b class="subt">Barrio:</b>&nbsp;<span><?=$barrio?></span>
<b class="subt">Telefono:</b>&nbsp;<span><?=$telefono?></span>
<b class="subt">Celular:</b>&nbsp;<span><?=$celular?></span>
<b class="subt">Mail:</b>&nbsp;<span><?=$mail?></span>

</div> <!-- columna -->

</div>

</p>
</div>




<div>
<p>
<div class="row">
<div class="col-sm-4">
<b class="subt">C.I del padre: </b>&nbsp;<span><?=$ced_padre?></span>
<b class="subt">Nombres:</b>&nbsp;<span><?=$nom_padre?></span>
<b class="subt">Apellidos:</b>&nbsp;<span><?=$ape_padre?><span>
</div>
<div class="col-sm-4">
<b class="subt">C.I de la madre </b>&nbsp;<span><?=$ced_madre?></span>
<b class="subt">Nombres:</b>&nbsp;<span><?=$nom_madre?></span>
<b class="subt">Apellidos:</b>&nbsp;<span><?=$ape_madre?></span>
</div>

<div class="col-sm-4">
<b class="subt">C.I del conyuge </b>&nbsp;<span><?=$ced_conyu?></span>
<b class="subt">Nombres:</b>&nbsp;<span><?=$nom_conyu?></span>
<b class="subt">Apellidos:</b>&nbsp;<span><?=$ape_conyu?></span>
</div>

</div>

</p>
</div> 


<div>
<p> 
 entr. sal. pais
</p>
</div>


<div>
<p>
<div class="row">
<?php if( sizeof($datospoli) > 0){  ?>
<div class="col-sm-6">
<b class="subt">Fecha de ingreso: </b>&nbsp;<span><?= $datospoli['fecha_ing']?></span>
<b class="subt">Decreto Nro.:</b>&nbsp;<span><?= $datospoli['decreto_nro'] ?></span>
<b class="subt">Fecha grab.:</b>&nbsp;<span><?= $datospoli['fechagrab'] ?></span>
<b class="subt">Servi. porta.: </b>&nbsp;<span><?= $datospoli['servi_porta']?></span>
<b class="subt">Otro documento:</b>&nbsp;<span><?= $datospoli['otro_doc'] ?></span>
<b class="subt">Estado:</b>&nbsp;<span><?= $datospoli['estado'] ?></span>
<b class="subt">Motivo: </b>&nbsp;<span><?= $datospoli['motivo']?></span>
</div>
<div class="col-sm-6">
<b class="subt">Lugar de servicio.:</b>&nbsp;<span><?= $datospoli['lug_servi'] ?></span>
<b class="subt">Promoci&oacute;n:</b>&nbsp;<span><?= $datospoli['promocion'] ?></span>
<b class="subt">Cred. pol.: </b>&nbsp;<span><?= $datospoli['credpol']?></span>
<b class="subt">Grado:</b>&nbsp;<span><?= $datospoli['grado_actual'] ?></span>
<b class="subt">Motivo baja:</b>&nbsp;<span><?= $datospoli['motibaja'] ?></span>
<b class="subt">Fecha de ingreso: </b>&nbsp;<span><?= $datospoli['fecha_ing']?></span>
<b class="subt">Fecha de baja:</b>&nbsp;<span><?= $datospoli['fecha_baja'] ?></span>
</div>

<?php }else{  
    $TITULO= "Sin resultados";
    $MENSAJE=" No se registra datos policiales";
    include('application/views/errors/errores.php'); } ?>
</div><!-- fin row --> 
</p>
</div>



<?php 

}/** EXISTE REGISTRO PARA ESTE NRO DE CEDULA **/

?>