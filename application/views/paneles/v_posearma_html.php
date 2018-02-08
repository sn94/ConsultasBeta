<?php



$datos=  $armas;


foreach($datos as $ite){?>

<p>

<b class="subt-in">Id. arma:</b> &nbsp; <?= $ite['id_arma']  ?> &nbsp;
<b class="subt-in">Serie nro.:</b>&nbsp;<?= $ite['serie_nro'] ?> &nbsp;
<b class="subt-in">Tipo de arma:</b>&nbsp;<?= $ite['tipo_arma'] ?> &nbsp;
<b class="subt-in">Tipo de uso:</b> &nbsp; <?= $ite['tipo_uso'] ?> &nbsp;
<b class="subt-in">Procedencia:</b>&nbsp;<?=  $ite['procede'] ?> &nbsp;
<b class="subt-in">Calibre:</b>&nbsp;<?= $ite['calibre'] ?> &nbsp;
<b class="subt-in">Marca:</b> &nbsp; <?= $ite['marca'] ?> &nbsp;
<b class="subt-in">Situaci&oacute;n:</b>&nbsp;<?= $ite['situacion'] ?> &nbsp;
</p>



<?php 
}/** end foreach **/
?>