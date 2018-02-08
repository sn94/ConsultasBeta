<?php

 /**    Titulares **/
 $Lista_titulares= $vehiculo_titu;
if( sizeof($Lista_titulares)  > 0){     ?>

<div class='row'>
<div class="col-sm-12 panel panel-info">
  <div class="panel-heading">Titular/es </div>
  <div class="panel-body">
  
<?php    foreach( $Lista_titulares as $lista_tit){  

 /** ** ***/
 $tipo_docu= $lista_tit['tipo_docu'];
$nro_docu= $lista_tit['nro_docu'];
$nombape= $lista_tit['nombape'];
$nacional= $lista_tit['nacional'];
$porce_titular= $lista_tit['porce_titular'];
/** *** ***/         ?>

<p>
<img src="img/icon_list.png" />
<b class="subt-in">Tipo doc.:</b> &nbsp; <?=$tipo_docu?> &nbsp;
<b class="subt-in">Nro. de doc. :</b>&nbsp;<?=$nro_docu?> &nbsp;
<b class="subt-in">Nombre y apellido:</b>&nbsp;<?=$nombape?> &nbsp;
<b class="subt-in">Nacionalidad:</b> &nbsp; <?=$nacional?> &nbsp;
<b class="subt-in">Porc. titular:</b>&nbsp;<?= $porce_titular?> &nbsp;
</p>

<?php   }/** fin foreach titulares **/ 
        echo "</div>"; /** end body panel**/
        echo "</div>"; /** end col **/
        echo "</div>"; /** end row **/
   }	?>