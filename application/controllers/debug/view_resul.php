<?php

function ver_array( $datos){
    foreach( $datos as $it){
        if( is_array(  $it)){
            echo "=============";
            foreach($it as $i){   echo $it." ";}
             echo "=============";
        }else{
            echo $it."<br/>";
        }
    
    }/** for each 1 **/
}

?>