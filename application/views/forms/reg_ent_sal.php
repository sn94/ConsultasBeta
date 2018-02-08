
 <script type="text/javascript">


$(document).ready(
function() {
$("form#ent-sal-form-<?=$nroci?> input:text[name=txt-fecha-ent-sal]").datepicker(

            {

                dateFormat: "yy/mm/dd",

                dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],

                dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],

                firstDay: 1,

                gotoCurrent: true,

                monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Deciembre" ]

            }

        );
        
        }
);

    
</script> 
<?php  echo validation_errors();  
$attributes = array('class' => 'estilo-form', 'id' => "ent-sal-form-$nroci");
$att_label = array(  'class' => 'form-text' );
$att_input_d = array(  'class' => 'form-control', 'readonly' => 'true' );
$att_input= array( 'class' => 'form-control');
$att_submit= array('class'=>"btn btn-info", 'id' =>'btn-reg-ent-sal', 
"onClick" => "grabarEntSalPais( $nroci)" );

/** *** ** ** **/
//echo form_open(  "abm/fallecimiento/".$nroci, $attributes );
echo "<form id='ent-sal-form-$nroci'>";
/** ** ** ** **/
echo "<div class='row'>";
echo "<div class='col-sm-offset-2 col-sm-8'>"; 
echo form_label("CI.:", "txt-ci-ent-sal", $att_label);
echo form_input("txt-ci-ent-sal",  $nroci, $att_input_d); // Esto es un textfield


echo form_label("Destino:", "txt-destino", $att_label);
echo form_input("txt-destino",  "", $att_input); // Esto es un textfield

echo form_fieldset("Tipo de movimiento "); 
echo form_radio("opc-mov", "EN",   true )." Entrada   ";
echo form_radio("opc-mov", "SA" )." Salida";
echo form_fieldset_close();

echo form_label("Fecha:", "txt-fecha-ent-sal", $att_label); 
echo form_input("txt-fecha-ent-sal","", $att_input ); // Esto es un textfield

echo form_label("Medio de traslado:", "txt-medio-tras", $att_label); 
echo form_input("txt-medio-tras","", $att_input ); // Esto es un textfield

echo form_label("Chapa del vehiculo:", "txt-medio-chapa", $att_label); 
echo form_input("txt-medio-chapa","", $att_input ); // Esto es un textfield

echo form_label("Obs.:", "txt-obs-ent-sal", $att_label); 
echo form_input("txt-obs-ent-sal","", $att_input ); // Esto es un textfield

echo form_button("btn-reg-ent-sal", "Enviar", $att_submit);
 //echo form_submit('btn-falleci', "Enviar",$att_submit );
echo "</div></div>";
echo form_close();
?>