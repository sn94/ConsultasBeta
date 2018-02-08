 <style type="text/css">
 ul#Enlaces li a{
     color: floralwhite;
 }
 
 </style>
  <footer class="container-fluid bg-success pt-3 h-100" >
        <div class="container bg-success">
            <div class="row justify-content-center">             
                 
                <div class="col-12">
                    <h5 style="color: floralwhite">Direcci&oacute;n</h5>
                    <address class="address">
		              <span class="fa fa-map-marker"></span>: E/Avenida Boggianni e Ytoror&oacute; , Asunci&oacute;n
		           </address>
                </div>
                 
           </div>
           <div class="row justify-content-center mt-5 mb-3" style="color: floralwhite">             
                <div class="col-auto"> 
                    <p style="text-align: center;">&copy; Copyright <?= date("Y") ?> Dpto.Inform&aacute;tica</p>
                </div>
           </div>
        </div>
    </footer>
    
 

<input type="hidden" value="0" id="punto-page"/>
      
</body>




<!-- JQuery -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>

<!-- Tether  -->
 <script type="text/javascript" src="<?= base_url() ?>assets/js/tether.min.js"></script>
 
<!-- Bootstrap  4  -->
 <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap.js"></script>


<!-- JQuery UI  --> 
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqueryui/jquery.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqueryui/jquery-ui.js"></script>

<!-- Time picker -->
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<!-- Otro scripts   -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/busqueda.js?v=5"></script> 
<script type="text/javascript" src="<?= base_url() ?>assets/js/easyResponsiveTabs.js"></script> 


<script type="text/javascript">


function busquedaRapida(){
var ci= $("input#txt-bus-fast").val(); 
 var urle= "<?= base_url() ?>index.php/consulta/fastSearch/"+ci; 
$.ajax({
    
url:  urle, 
beforeSend: function(){ $("#panel-resultados").html("<p><img style='width: 40px; height: 40px;' src='<?= base_url()?>img/wait.gif'></p>");},
success: function(data){  $("#panel-resultados").html( data);      },
error: function (jqXHR, textStatus, errorThrown){
$( "#panel-resultados" ).html("<div class='alert alert-warning alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Codigo: "+jqXHR.status+"</strong><br/><strong> Descr. Estado: "+textStatus+"</strong><br/><strong> Error: "+errorThrown+"</strong></div>");   }
    
});/******  ajax  ***/

/** Borrar campo de busqueda **/
$("#txt-bus-fast").val("");
}



$(function() {
    
    
     


/*** Nacionalidad *******/
buscar_nacionali("<?= base_url('index.php/consulta/nacionalidades') ?>");


     $('div#opc-bus-nom').show();
     $('div#opc-bus-veh').hide(); 
       
     
    
   $("input:text[id^=fecha]").datepicker(

            {

                dateFormat: "dd/mm/yy",

                dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],

                dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],

                firstDay: 1,

                gotoCurrent: true,

                monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Deciembre" ]

            }

        );
        
        });
 

  


function modalidadDeBusqueda(){
var mo= $('#modos-bus').val();
switch(parseInt( mo )){
    case 1: accion_busqueda_ci(); break;
    case 2: accion_busqueda_nombre();break;
    case 3: accion_busqueda_vehiculo();break;
}
}




function  accion_busqueda_ci(){
    
$('div#opc-bus-nom:visible').hide();  

$('div#opc-bus-veh:visible').hide();
    
}

function  accion_busqueda_nombre(){
    
$('div#opc-bus-nom:hidden').show();  

$('div#opc-bus-veh:visible').hide();
    
}

function  accion_busqueda_vehiculo(){
    
$('div#opc-bus-nom:visible').hide();
$('div#opc-bus-veh:hidden').show();
    
} 
 
 
  

</script>
 

</html>
