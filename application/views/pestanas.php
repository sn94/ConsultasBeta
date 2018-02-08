 <?php
 
 $path2=  base_url()."index.php/consulta/judiciales/". $nroci; $obj2="pan-2-".$nroci;
 $path3=  base_url()."index.php/consulta/penitenciarios/". $nroci;$obj3="pan-3-".$nroci;
$path4=  base_url()."index.php/consulta/residencia/". $nroci;$obj4="pan-4-".$nroci;
$path5=  base_url()."index.php/consulta/comisarias/". $nroci;$obj5="pan-5-".$nroci;
$path6=  base_url()."index.php/consulta/vehiculos/". $nroci;$obj6="pan-6-".$nroci;
$path7=  base_url()."index.php/consulta/armas/". $nroci;$obj7="pan-7-".$nroci;

 
 $sub_path2= base_url()."index.php/consulta/familiares/".$nroci; $sub_obj2="sub-pan-2-".$nroci;
  $sub_path3= base_url()."index.php/consulta/policias/".$nroci; $sub_obj3="sub-pan-3-".$nroci;
  $sub_path4= base_url()."index.php/consulta/entsal/".$nroci; $sub_obj4="sub-pan-4-".$nroci;
  $sub_path5= base_url()."index.php/consulta/fichaje/".$nroci; $sub_obj5="sub-pan-5-".$nroci;
  
 ?>
    <div id="container">

       <!-- <h1 style="font-size:32px">Easy Responsive Tabs to Accordion (with Nested Tabs)</h1>-->
        <hr>
        <br/>
        <br/>

      <!--  <h2>Horizontal Tab with (Nested Tabs) </h2>-->
        <br/>
        <!--Horizontal Tab-->
        <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
                <li>Personales</li>
                <li><a href="javascript:loadingInfo('<?= $path2 ?>', '<?= $obj2?>')" >Judiciales</a></li>
                <li><a href="javascript:loadingInfo('<?= $path3 ?>', '<?= $obj3?>')">Penitenciarios</a></li>
                <li><a href="javascript:loadingInfo('<?= $path4 ?>', '<?= $obj4?>')" >Vida y residencia</a></li>
                 <li><a href="javascript:loadingInfo('<?= $path5 ?>', '<?= $obj5?>')">Ent. a comisarias</a></li>
                 <li><a  href="javascript:loadingInfo('<?= $path6 ?>', '<?= $obj6?>')">P.Veh&iacute;culos</a></li>
                 <li><a href="javascript:loadingInfo('<?= $path7 ?>', '<?= $obj7?>')">P.Armas</a></li>
            </ul>
            <div class="resp-tabs-container hor_1">
                <div>
                    <p>
                        <!--vertical Tabs-->

                        <div id="ChildVerticalTab_1-<?= $nroci ?>">
                            <ul class="resp-tabs-list ver_1">
                 <li>B&aacute;sicos</li>
                <li><a href="javascript:loadingInfo('<?= $sub_path2 ?>','<?= $sub_obj2?>')">Familiares</a></li>
                <li><a href="javascript:loadingInfo('<?= $sub_path3 ?>','<?= $sub_obj3?>')">Datos pers. policial</a></li>
                 <li><a href="javascript:loadingInfo('<?= $sub_path4 ?>','<?= $sub_obj4?>')">Ent. Sal. del pa&iacute;s</a></li>
                <li><a href="javascript:loadingInfo('<?= $sub_path5 ?>','<?= $sub_obj5?>')">Fichaje</a></li>
                    </ul>
                            <div class="resp-tabs-container ver_1">
                                <div>
                                  
                                  <?php   include("application/views/paneles/personal/vista_basica.php"); ?>
                                
                                </div>
                                <div id="sub-pan-2-<?= $nroci?>">
                                <div class="alert alert-info">
                                <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
                                </div>
                                </div>
                                
                                <div id="sub-pan-3-<?= $nroci?>">
                                <div class="alert alert-info">
                                <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
                                </div>
                                </div>
                                
                                
                                <div id="sub-pan-4-<?= $nroci?>">
                                <div class="alert alert-info">
                                <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
                                </div>
                                </div>
                                
                                
                                 <div id="sub-pan-5-<?= $nroci?>">
                                <div class="alert alert-info">
                                <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
                                </div>
                                </div>
                                
                                
                            </div><!-- end vertical tab -->
                        </div>
                    </p>
                    <p> Pesta&ntilde;a 1</p>
                </div>
                
                
                
                
                <div id="pan-2-<?= $nroci ?>">
                <div class="alert alert-info">
                                <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
                                </div>
                <br>
                <br>
                <p>Tab 2 Container</p>
                </div>
                
                <div id="pan-3-<?= $nroci ?>">
                  <div class="alert alert-info">
                                <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
                                </div>
                    <br>
                    <br>
                    <p>Tab 3 Container</p>
                </div>
                
                 <div id="pan-4-<?= $nroci ?>">
                  <div class="alert alert-info">
                  <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
                  </div>
                    <br>
                    <br>
                    <p>Tab 4 Container</p>
                </div>
                
                
                <div id="pan-5-<?= $nroci ?>">
               <div class="alert alert-info">
               <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
               </div>
               <br>
               <br>
                    <p>Tab 5 Container</p>
                </div>

                <div id="pan-6-<?= $nroci ?>">
                 <div class="alert alert-info">
                 <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
                 </div>
                 <br>
                 <br>
                    <p>Tab 6 Container</p>
                </div>
                
                <div id="pan-7-<?= $nroci ?>">
                <div class="alert alert-info">
                <strong>Si usted esta leyendo esto</strong> Aseg&uacute;rese de hacer click correctamente en el link 
                </div>
                <br>
                <br>
                    <p>Tab 7 Container</p>
                </div>
                

            </div>
            
        </div> 
        
        <br/>
        <br/>
        <br/>


         
    </div>
	
 <script>
 function loadingInfo(enlacee, objetoo){ 
  var enlace= enlacee;
 var objeto= objetoo; 
 
 $.ajax({
    
url:  enlace, 
beforeSend: function(){ $("#"+objeto).html("<p><img style='width: 40px; height: 40px;' src='<?= base_url()?>img/wait.gif'></p>");},
success: function(data){  $("#"+objeto).html( data);      },
error: function (jqXHR, textStatus, errorThrown){
$( "#"+objeto ).html("<div class='alert alert-warning alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Codigo: "+jqXHR.status+"</strong><br/><strong> Descr. Estado: "+textStatus+"</strong><br/><strong> Error: "+errorThrown+"</strong></div>");   }
    
});/******  ajax  ***/

}
    
  
 </script>