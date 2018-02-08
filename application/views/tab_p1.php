
<?php   
 
$a= $nrodoc;// Se accede solo a la unica columna del registro obtenido

?>


<?php
echo "<div id='container".$a."'>";
?>

        <hr>
        <br/>
        <!--Horizontal Tab-->
        
      <?php  echo "<div id='parentHorizontalTab".$a."'>";
      
$rta_base=base_url('index.php/consulta'); 


      ?>
            <ul class="resp-tabs-list hor_1">
            
                <li>  Datos Personales </li>
                <li onclick="consulta_especi('<?= $rta_base ?>', <?=$a?>, 2)"> <a href="javascript:consulta_especi( '<?= $rta_base ?>',  <?=$a?>, 2)">Judiciales</a></li>
                <li onclick="consulta_especi( '<?= $rta_base ?>' , <?=$a?>, 3)" > <a href="javascript:consulta_especi( '<?= $rta_base ?>',  <?=$a?>, 3)">S. Penitenciaria</a> </li>
                <li onclick="consulta_especi( '<?= $rta_base ?>' , <?=$a?>, 4)"> <a href="javascript:consulta_especi( '<?= $rta_base ?>', <?=$a?>, 4)"> Vida y Residencia </a> </li>
                <li onclick="consulta_especi( '<?= $rta_base ?>' , <?=$a?>, 5)" > <a href="javascript:consulta_especi( '<?= $rta_base ?>',  <?=$a?>, 5)">Entr. a Comisarias</a> </li>
                <li onclick="consulta_especi( '<?= $rta_base ?>', <?=$a?>, 6)"> <a href="javascript:consulta_especi( '<?= $rta_base ?>',  <?=$a?>, 6)"> P. de veh&iacute;culos </a> </li>
                <li onclick="consulta_especi( '<?= $rta_base ?>' , <?=$a?>, 7)"> <a href="javascript:consulta_especi( '<?= $rta_base ?>',  <?=$a?>, 7)">P. de armas</a> </li>
            </ul>
            
            <?php echo "<div  class='resp-tabs-container hor_1'>"; ?>
                <div>
                    <p>
                        <!--vertical Tabs-->

                     <?php echo   "<div id='ChildVerticalTab_".$a."'>";?>
                     
                     
                            <ul class="resp-tabs-list ver_1">
                                <li>Datos b&aacute;sicos</li>
                                <li>Familiares</li>
                                <li>Ent. Sal. del pa&iacute;s</li>
                                 <li>Registro policial</li>
                            </ul>
<?php echo "<div  id='panel-".$a."-1' class='resp-tabs-container ver_1'>";?>
                           