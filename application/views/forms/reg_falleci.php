 <script type="text/javascript">


$(document).ready(
function() {
    
$(".time-picker").timepicker({ 
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true});

$("input:text[id=fechaf-<?=$nroci?>]").datepicker(

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
$attributes = array('class' => 'estilo-form', 'id' => 'death-form');
$att_label = array(  'class' => 'form-text' );
$att_input_d = array(  'class' => 'form-control', 'readonly' => 'true' );
$att_input= array( 'class' => 'form-control');
$att_inputdate= array( 'class' => 'form-control', "id"=> 'fechaf-'.$nroci);
$att_inputtime= array( 'class' => array('form-control','time-picker') );
$att_submit= array('class'=>"btn btn-info", 'id' =>'btn-grab-fall', "onClick" => "grabarFallecimiento( $nroci)" );

/** *** ** ** **/
//echo form_open(  "abm/fallecimiento/".$nroci, $attributes );
echo "<form id='death-form-$nroci'>";
/** ** ** ** **/
echo "<div class='row'>";
echo "<div class='col-sm-6'>";
echo form_label("Nro. C.I:", "txt-ci-fall", $att_label);
echo form_input("txt-ci-fall",  $nroci, $att_input_d); // Esto es un textfield

echo form_label("Nombres y apellidos:", "txt-nom-fall", $att_label);
$nomxx= (isset($nom)? $nom : "" ) .  " ".  (isset($ape)? $ape : "");
echo form_input("txt-nom-fall", $nomxx=="" ? set_value('txt-nom-fall') : $nomxx, $att_input ); // Esto es un textfield

echo form_label("Lugar de fallecimiento:", "txt-lug-fall", $att_label);
$val_lugs= array();
foreach( $lugar_fall as $it){
    $val_lugs[ $it['id']]= $it['descrip'];
}/** for each **/
echo form_dropdown("txt-lug-fall", $val_lugs, array() , $att_input); // Esto es un textfield
 

echo form_label("Causa:", "txt-causa-fall", $att_label);
$val_causas= array();
foreach( $causa_fall as $it){
    $val_causas[ $it['id']]= $it['descrip'];
}/** for each **/
echo form_dropdown("txt-causa-fall", $val_causas, array() , $att_input); // Esto es un textfield
 
 
echo form_label("Intervinientes:", "txt-interv-fall", $att_label);
echo form_input("txt-interv-fall", set_value('txt-interv-fall'), $att_input ); // Esto es un textfield

echo form_label("Jurisdiccion:", "txt-juris-fall", $att_label);
echo form_input("txt-juris-fall", set_value('txt-juris-fall'), $att_input ); // Esto es un textfield

echo form_label("Hora de fallec.:", "txt-hora-fall", $att_label);
echo form_input("txt-hora-fall", set_value('txt-hora-fall'), $att_inputtime ); // Esto es un textfield

echo '</div>';/** fin columna 1**/

echo "<div class='col-sm-6'>";

echo form_label("Fecha de fallec.:", "fechaf-$nroci", $att_label);
echo form_input("fechaf", set_value('fechaf'), $att_inputdate ); // Esto es un textfield
 


echo form_label("Obs.:", "txt-obs-fall", $att_label);
echo form_input("txt-obs-fall", set_value('txt-obs-fall'), $att_input ); // Esto es un textfield


echo form_label("Medico forense:", "txt-med_fore", $att_label);
echo form_input("txt-med-fore", set_value('txt-med-fore'), $att_input ); // Esto es un textfield

echo form_label("Circunstancia de fallec.:", "txt-circ-fall", $att_label);
$val_circu= array();
foreach( $circu_fall as $it){
    $val_circu[ $it['id']]= $it['descrip'];
}/** for each **/
echo form_dropdown("txt-circ-fall", $val_circu, array() , $att_input); // Esto es un textfield
 

echo form_label("Usuario grab.:", "txt-usu-fall", $att_label);
echo form_input("txt-usu-fall", $this->nativesession->get("usr")  , $att_input_d); // Esto es un textfield

echo form_label("Fech grab.:", "txt-fechag-fall", $att_label);
date_default_timezone_set("America/Asuncion");
echo form_input("txt-fechag-fall", date('Y-m-d'), $att_input_d); // Esto es un textfield

echo form_label("Dependencia grab.:", "txt-depen-fall", $att_label);
echo form_input("txt-depen-fall", $this->nativesession->get("depend"), $att_input_d); // Esto es un textfield)

echo '</div>';/** fin columna 2 **/

echo '</div>';
/** ** ** ** **/


//echo form_submit('btn-falleci', "Enviar",$att_submit );
echo form_button("btn-reg-falle", "Enviar", $att_submit);

echo form_close();
?>