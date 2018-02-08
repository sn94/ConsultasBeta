<?php


function  datos_fichaje($nrodocumento){

$sql15="select b.etn_descri,c.ciu_descri,d.dbar_descri,e.prof_descri,f.est_descri,g.cut_descri,a.nrodoc,a.alias,
a.domicilio,a.estatura,a.linea_baja,a.linea_celular1,a.linea_celular2,a.observacion,a.usugra,a.dependgra,a.fechagra
from deportivo.fichas a inner join deportivo.etnias b on(b.etn_id=a.etn_id) inner join deportivo.ciudades c on (c.ciu_id=a.ciu_id) 
inner join deportivo.barrios d on(d.dbar_id=a.dbar_id) inner join deportivo.profesiones e on(e.prof_id=a.prof_id) 
inner join deportivo.estados_civiles f on(f.est_id=a.est_id) inner join deportivo.cutis g on(g.cut_id=a.cut_id) 
 where nrodoc='$nrodocumento'";


$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');

  if (PEAR::isError($mdb2)) {
    mostrarError( $mdb2);
      die($mdb2->getMessage());
  }else{
	  
  $mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);

 $res15 = $mdb2->query($sql15);
    if (PEAR::isError($res15)) {
        mostrarError( $res15 );
      die($res15->getMessage());
   }  
   
    $rowcont15=$res15->numRows();
    $rowper15=  array();
    
    if( $rowcont15 >0){
   $rowper15 = $res15->fetchRow(MDB2_FETCHMODE_ASSOC);
     
        return $rowper15;
         
    } /** Numero de registros mayores a cero **/
else{ return null;} /** No hay nada **/

  }
 
}



?>