<!-- REGISTRAR COMO FALLECIDO -->
<?php  
/** VARIABLES CON DATOS ID PARA CREAR EL MODAL **/
$title_mod="";
$mod_name="";
$div_name="";
$nom_form="";


  if( !$fallecido){ ?>
<!-- BOTON QUE ABRE UNA VENTANA MODAL CON EL FORMULARIO DE REGISTRO -->
<button class="btn btn-danger btn-xs mb-1" data-toggle="modal" data-target="#modal-<?= $nroci ?>-f">Reg. Fallecimiento</button><br/>

<?php  
$title_mod="Registro de fallecimiento";
$mod_name="modal-".$nroci."-f";
$div_name="res-form-fall-".$nroci;
$nom_form= "death-form";
 include("application/views/forms/cab_modal.php");
 include("application/views/forms/reg_falleci.php");
  include("application/views/forms/pie_modal.php");?>
  
  
<!-- REGISTRAR ENTRADA O SALIDA DEL PAIS-->
<!-- BOTON QUE ABRE UNA VENTANA MODAL CON EL FORMULARIO DE REGISTRO -->
<button class="btn btn-danger btn-xs mt-1" data-toggle="modal" data-target="#modal-<?= $nroci ?>-es">Ent. y Sal. del pa&iacute;s</button><br/>

<?php 
$title_mod="Registro de Entradas y Salidas del pais";
$mod_name="modal-".$nroci."-es";
$div_name="res-form-esp-".$nroci;
$nom_form="ent-sal-form";
 include("application/views/forms/cab_modal.php");
 include("application/views/forms/reg_ent_sal.php");
  include("application/views/forms/pie_modal.php");
   

}else{ ?>
<span class="badge badge-pill badge-warning">
  <button onclick="" class="btn btn-danger btn-xs mt-1" data-toggle="modal" data-target="#fallecido-<?= $nroci ?>" >FALLECIDO</button></span>

<div class="modal fade" id="fallecido-<?= $nroci?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Datos de Fallecimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body id='fallecido-b-<?= $nroci?>">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php }?>

<script type="text/javascript">
function grabarEntSalPais( nroced){
var textUrl= '<?= base_url() ?>index.php/abm/ent_sal_Pais/'+nroced;
var serializado= $('form#ent-sal-form-'+ nroced	).serialize(); 

 $.ajax( {
url: textUrl,   
data: serializado ,
method: "post",
success: function (data) { 
    if(data){
       $( "#res-form-esp-"+nroced ).html(data) ; 
    }
      },
    
error: function (jqXHR, textStatus, errorThrown){
    $( "#res-form-esp-"+nroced ).html("<div class='alert alert-warning alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Codigo: "+jqXHR.status+"</strong><br/><strong> Descr. Estado: "+textStatus+"</strong><br/><strong> Error: "+errorThrown+"</strong></div>");
   },
timeout: 10000
 
});   

     
}



$("#fallecido-<?= $nroci ?>").on('show.bs.modal', function (e) {
  $("#fallecido-b-<?= $nroci ?>").load(
    "<?= base_url()?>index.php/Consulta/fallecido/<?= $nroci ?>");

});

 


</script>